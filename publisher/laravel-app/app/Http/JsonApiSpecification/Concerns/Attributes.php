<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification\Concerns;

use App\Http\JsonApiSpecification\Supports\Fields;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\PotentiallyMissing;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

/**
 * @internal
 */
trait Attributes
{
    /**
     * @return void
     */
    public static function useMinimalAttributes(): void
    {
        App::instance(self::class.':$minimalAttributes', true);
    }

    /**
     * @return bool
     * @throws BindingResolutionException
     */
    private static function minimalAttributes(): bool
    {
        return App::bound(self::class.':$minimalAttributes')
            ? App::make(self::class.':$minimalAttributes')
            : false;
    }

    /**
     * @return Collection<string, mixed>
     * @throws BindingResolutionException
     */
    private function requestedAttributes(Request $request): Collection
    {
        return Collection::make($this->resolveAttributes($request))
            ->only($this->requestedFields($request))
            ->map(fn (mixed $value): mixed => value($value))
            ->reject(fn (mixed $value): bool => $value instanceof PotentiallyMissing && $value->isMissing());
    }

    /**
     * @return Collection<string, mixed>
     */
    private function resolveAttributes(Request $request): Collection
    {
        return Collection::make(property_exists($this, 'attributes') ? $this->attributes : [])
            ->mapWithKeys(fn (string $attribute, int|string $key): array => [
                $attribute => fn () => $this->resource->{$attribute},
            ])
            ->merge($this->toAttributes($request));
    }

    /**
     * @return array<int, string>|null
     * @throws BindingResolutionException
     */
    private function requestedFields(Request $request): ?array
    {
        return Fields::getInstance()->parse($request, $this->toType($request), self::minimalAttributes());
    }
}
