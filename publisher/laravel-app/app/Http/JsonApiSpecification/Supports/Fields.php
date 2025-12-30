<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification\Supports;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use WeakMap;

final class Fields
{
    private static ?self $instance;

    /**
     * @var WeakMap<Request, array<string, array<int, string>|null>>
     */
    private WeakMap $cache;

    private function __construct(WeakMap $cache = new WeakMap)
    {
        $this->cache = $cache;
    }

    /**
     * @return self
     */
    public static function getInstance(): Fields
    {
        return self::$instance ??= new self;
    }

    /**
     * @return array<int, string>|null
     */
    public function parse(Request $request, string $resourceType, bool $minimalAttributes): ?array
    {
        return $this->rememberResourceType($request, "type:{$resourceType};minimal:{$minimalAttributes};", function () use ($request, $resourceType, $minimalAttributes): ?array {
            $typeFields = $request->query('fields') ?? [];

            if (is_string($typeFields)) {
                throw new HttpException(400, 'The fields parameter must be an array of resource types.');
            }

            if (! array_key_exists($resourceType, $typeFields)) {
                return $minimalAttributes
                    ? []
                    : null;
            }

            $fields = $typeFields[$resourceType] ?? '';

            if (! is_string($fields)) {
                throw new HttpException(400, 'The fields parameter value must be a comma seperated list of attributes.');
            }

            return array_filter(explode(',', $fields), fn (string $value): bool => $value !== '');
        });
    }

    /**
     * @infection-ignore-all
     *
     * @param  (callable(): (array<int, string>|null))  $callback
     * @return array<int, string>|null
     */
    private function rememberResourceType(Request $request, string $resourceType, callable $callback): ?array
    {
        $this->cache[$request] ??= [];

        return $this->cache[$request][$resourceType] ??= $callback();
    }
}
