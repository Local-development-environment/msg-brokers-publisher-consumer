<?php

namespace App\Http\Admin\Insert\Stones\Resources;

use App\Http\Admin\Insert\StoneTypeOrigins\Resources\StoneTypeOriginResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\Stones\Enums\StoneRelationshipsEnum;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Stone */
class StoneResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => StoneEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneRelationshipsEnum::TYPE_ORIGIN->value => $this->sectionRelationships(
                    'stones.stone-type-origin',
                    StoneTypeOriginResource::class
                )
            ]
        ];
    }
protected function relations(): array
{
    return [
        StoneTypeOriginResource::class => $this->whenLoaded(StoneRelationshipsEnum::TYPE_ORIGIN->value)
    ];
}}
