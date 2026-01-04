<?php

declare(strict_types=1);

namespace App\Http\Shared\Resources\Traits\ImprovedTraits;

use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;
use Illuminate\Support\Collection;

trait IncludeRelatedEntitiesResourceTrait
{
    abstract function relations();

    public function included(Request $request): Collection
    {
        return collect($this->relations())
            // filter to-many $this->>whenLoaded('relation') is a MissingValue
            ->filter(function ($relation) {
                return !$relation->resource instanceof MissingValue;
            })
            // filter empty collection
            ->filter(function ($relation) {
                return $relation->collection !== null;
            })
            // filter to-one $this->whenLoaded('relation') is a MissingValue
            ->filter(function ($relation) {
                return !$relation->collection[0]->resource instanceof MissingValue;
            })
            ->flatMap(function ($relation) use ($request) {
                return $relation->toArray($request);
            });
    }

    /**
     * @param $request
     * @return array
     */
    public function with($request): array
    {
        $with = [];

        if ($this->included($request)->isNotEmpty()) {
            $with['included'] = $this->included($request);
        }

        return $with;
    }

    protected function relatedIdentifiers($resource)
    {
        if ($resource instanceof Model) {
            return new ApiEntityIdentifierResource($resource);
        }

        if ($resource instanceof Collection) {
            return ApiEntityIdentifierResource::collection($resource)->take(config('api-settings.limit-included'));
        }

        if ($resource instanceof MissingValue) {
            return new MissingValue();
        }

        return null;
    }

    protected function sectionRelationships(string $relatedUrlName, string $relation): array
    {
        $resource = $this->whenLoaded($relation);

        $explodedName = explode('.', $relatedUrlName);
        array_splice($explodedName, 1, 0, 'relationships');
        $selfUrlName = implode('.', $explodedName);
        /** @var JsonResource $this */
        if ($resource instanceof Collection) {
            $related = [
                'href' => route($relatedUrlName, ['id' => $this->resource->id]),
                'meta' => [
                    'total' => $this->totalRelatedData($resource),
                    'limit' => $this->limitRelatedItems()
                ]
            ];
        } else {
            $related = [
                'href' => route($relatedUrlName, ['id' => $this->resource->id])
            ];
        }

        return [
            'links' => [
                'self' => route($selfUrlName, ['id' => $this->resource->id]),
                'related' => $related
            ],
            'data' => $this->relatedIdentifiers($resource)
        ];
    }

    /**
     * @param Model|Collection|MissingValue $whenLoaded
     * @return int
     */
    protected function totalRelatedData(Model|Collection|MissingValue $whenLoaded): mixed
    {
        if ($whenLoaded instanceof Collection) {
            return $whenLoaded->count();
        }

        return new MissingValue();
    }

    /**
     * @return array
     */
    protected function attributeItems(): array
    {
        $attributes = $this->resource->getAttributes();
        unset($attributes['id']);

        return $attributes;
    }

    /**
     * @return int|null
     */
    protected function limitRelatedItems(): int|null
    {
        $limit = (int) config('api-settings.limit-included');

        return $limit ? : null;
    }
}
