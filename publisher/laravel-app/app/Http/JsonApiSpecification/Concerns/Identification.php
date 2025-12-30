<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification\Concerns;

use App\Http\JsonApiSpecification\Exceptions\ResourceIdentificationException;
use App\Http\JsonApiSpecification\ResourceIdentifier;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

trait Identification
{
    private ?string $idCache = null;

    private ?string $typeCache = null;

    /**
     * @var array<int, (callable(ResourceIdentifier): void)>
     */
    private array $resourceIdentifierCallbacks = [];

    /**
     * @param  (callable(mixed): string)  $callback
     * @return void
     */
    public static function resolveIdUsing(callable $callback): void
    {
        App::instance(self::class.':$idResolver', $callback);
    }

    /**
     * @param  (callable(mixed): string)  $callback
     * @return void
     */
    public static function resolveTypeUsing(callable $callback): void
    {
        App::instance(self::class.':$typeResolver', $callback);
    }

    /**
     * @return (callable(mixed, Request): string)
     * @throws BindingResolutionException
     */
    private static function idResolver(): callable
    {
        if (! App::bound(self::class.':$idResolver')) {
            return App::instance(self::class.':$idResolver', function (mixed $resource, Request $request): string {
                if (! $resource instanceof Model) {
                    throw ResourceIdentificationException::attemptingToDetermineIdFor($resource);
                }

                /**
                 * @phpstan-ignore-next-line
                 */
                return (string) $resource->getKey();
            });
        }

        return App::make(self::class.':$idResolver');
    }

    /**
     * @return (callable(mixed, Request): string)
     * @throws BindingResolutionException
     */
    private static function typeResolver(): callable
    {
        if (! App::bound(self::class.':$typeResolver')) {
            return App::instance(self::class.':$typeResolver', function (mixed $resource, Request $request): string {
                if (! $resource instanceof Model) {
                    throw ResourceIdentificationException::attemptingToDetermineTypeFor($resource);
                }

                return Str::camel($resource->getTable());
            });
        }

        return App::make(self::class.':$typeResolver');
    }

    /**
     * @param  (callable(ResourceIdentifier): void)  $callback
     * @return $this
     */
    public function pipeResourceIdentifier(callable $callback)
    {
        $this->resourceIdentifierCallbacks[] = $callback;

        return $this;
    }

    /**
     * @param Request $request
     * @return ResourceIdentifier
     * @internal
     *
     */
    public function resolveResourceIdentifier(Request $request): ResourceIdentifier
    {
        return with($this->toResourceIdentifier($request), function (ResourceIdentifier $identifier): ResourceIdentifier {
            foreach ($this->resourceIdentifierCallbacks as $callback) {
                $identifier = $callback($identifier);
            }

            return $identifier;
        });
    }

    /**
     * @internal
     *
     * @return array{0: string, 1: string}
     */
    public function uniqueKey(Request $request): array
    {
        return [$this->resolveType($request), $this->resolveId($request)];
    }

    /**
     * @param Request $request
     * @return string
     */
    private function resolveId(Request $request): string
    {
        return $this->idCache ??= $this->toId($request);
    }

    /**
     * @param Request $request
     * @return string
     */
    private function resolveType(Request $request): string
    {
        return $this->typeCache ??= $this->toType($request);
    }
}
