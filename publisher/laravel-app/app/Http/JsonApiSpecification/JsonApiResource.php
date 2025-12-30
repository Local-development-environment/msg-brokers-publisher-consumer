<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification;

use App\Http\JsonApiSpecification\Concerns\Attributes;
use App\Http\JsonApiSpecification\Concerns\Caching;
use App\Http\JsonApiSpecification\Concerns\Identification;
use App\Http\JsonApiSpecification\Concerns\Implementation;
use App\Http\JsonApiSpecification\Concerns\Links;
use App\Http\JsonApiSpecification\Concerns\Meta;
use App\Http\JsonApiSpecification\Concerns\RelationshipLinks;
use App\Http\JsonApiSpecification\Concerns\Relationships;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\PotentiallyMissing;
use Illuminate\Support\Collection;
use stdClass;

final class JsonApiResource extends JsonResource
{
    use Attributes,
        Caching,
        Identification,
        Links,
        Meta,
        Implementation,
        RelationshipLinks,
        Relationships;

    /**
     * @return array<string, mixed>
     */
    public function toAttributes(Request $request): array
    {
        return [
            //
        ];
    }

    /**
     * @return array<string, (callable(): JsonApiResource|JsonApiResourceCollection|PotentiallyMissing)>
     */
    public function toRelationships(Request $request): array
    {
        return [
            //
        ];
    }

    /**
     * @return array<int, Link>
     */
    public function toLinks(Request $request): array
    {
        return [
            //
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toMeta(Request $request): array
    {
        return [
            //
        ];
    }

    /**
     * @param Request $request
     * @return string
     * @throws BindingResolutionException
     */
    public function toId(Request $request): string
    {
        return self::idResolver()($this->resource, $request);
    }

    /**
     * @param Request $request
     * @return string
     * @throws BindingResolutionException
     */
    public function toType(Request $request): string
    {
        return self::typeResolver()($this->resource, $request);
    }

    /**
     * @param Request $request
     * @return RelationshipObject
     */
    public function toResourceLink(Request $request): RelationshipObject
    {
        return $this->resource === null
            ? RelationshipObject::toOne(null)
            : RelationshipObject::toOne($this->resolveResourceIdentifier($request));
    }

    /**
     * @param Request $request
     * @return ResourceIdentifier
     */
    public function toResourceIdentifier(Request $request): ResourceIdentifier
    {
        return new ResourceIdentifier($this->resolveType($request), $this->resolveId($request));
    }

    /**
     * @param Request $request
     * @return ServerImplementation|null
     * @throws BindingResolutionException
     */
    public static function toServerImplementation(Request $request): ?ServerImplementation
    {
        return self::serverImplementationResolver()($request);
    }

    /**
     * @return array{id: string, type: string, attributes?: stdClass, relationships?: stdClass, meta?: stdClass, links?: stdClass}
     * @throws BindingResolutionException
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resolveId($request),
            'type' => $this->resolveType($request),
            ...Collection::make([
                'attributes' => $this->requestedAttributes($request)->all(),
                'relationships' => $this->requestedRelationshipsAsIdentifiers($request)->all(),
                'links' => self::parseLinks(array_merge($this->toLinks($request), $this->links)),
                'meta' => array_merge($this->toMeta($request), $this->meta),
            ])->filter()->map(fn ($value) => (object) $value),
        ];
    }

    /**
     * @param Request $request
     * @return array{included?: array<int, JsonApiResource>, jsonapi: ServerImplementation}
     * @throws BindingResolutionException
     */
    public function with(Request $request): array
    {
        return [
            ...($included = $this->included($request)
                ->uniqueStrict(fn (JsonApiResource $resource): array => $resource->uniqueKey($request))
                ->values()
                ->all()) ? ['included' => $included] : [],
            ...($implementation = self::toServerImplementation($request))
                ? ['jsonapi' => $implementation] : [],
        ];
    }

    /**
     * TODO this may be removed once all supported versions have `newCollection`.
     *
     * @return JsonApiResourceCollection<int, mixed>
     */
    public static function collection(mixed $resource): JsonApiResourceCollection
    {
        return tap(static::newCollection($resource), function (JsonApiResourceCollection $collection): void {
            if (property_exists(static::class, 'preserveKeys')) {
                /** @phpstan-ignore-next-line */
                $collection->preserveKeys = (new static([]))->preserveKeys === true;
            }
        });
    }

    /**
     * @return JsonApiResourceCollection<int, mixed>
     */
    public static function newCollection(mixed $resource): JsonApiResourceCollection
    {
        return new JsonApiResourceCollection($resource, static::class);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        return tap(parent::toResponse($request)->header('Content-type', 'application/vnd.api+json'), $this->flush(...));
    }
}
