<?php

namespace App\Http\Shared\Resources\Traits;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\MissingValue;
use Illuminate\Support\Collection;

trait IncludeRelatedEntitiesCollectionTrait
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray(Request $request): array|\JsonSerializable|Arrayable
    {
        return [
            'data'     => $this->collection,
            'included' => $this->mergeIncludedRelations($request),
            'meta' => [
//                'total' => $this->total() ?? null
//                'total' => $this->collection->count()
            ]
        ];
    }

    /**
     * @param $request
     * @return MissingValue|Collection
     */
    private function mergeIncludedRelations($request): MissingValue|Collection
    {
        $includes = $this->collection->flatMap(function ($resource) use ($request) {
            return $resource->included($request);
        })->unique('glob_id')->values();

        return $includes->isNotEmpty() ? $includes : new MissingValue();
    }

//    abstract protected function total(): int;
}
