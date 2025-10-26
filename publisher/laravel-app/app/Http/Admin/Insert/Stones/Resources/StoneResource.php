<?php

namespace App\Http\Admin\Insert\Stones\Resources;

use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneResource;
use App\Http\Admin\Insert\ImitationStones\Resources\ImitationStoneResource;
use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Admin\Insert\StoneColours\Resources\StoneColourCollection;
use App\Http\Admin\Insert\StoneFacets\Resources\StoneFacetCollection;
use App\Http\Admin\Insert\StoneTypeOrigins\Resources\StoneTypeOriginResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\Stones\Enums\StoneNameRoutesEnum;
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
                    StoneNameRoutesEnum::RELATED_TO_STONE_TYPE_ORIGIN->value,
                    StoneTypeOriginResource::class
                ),
                StoneRelationshipsEnum::IMITATION_STONE->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_IMITATION_STONE->value,
                    ImitationStoneResource::class
                ),
                StoneRelationshipsEnum::GROWN_STONE->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_GROWN_STONE->value,
                    GrownStoneResource::class
                ),
                StoneRelationshipsEnum::NATURAL_STONE->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_NATURAL_STONE->value,
                    NaturalStoneResource::class
                ),
                StoneRelationshipsEnum::FACETS->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_FACETS->value,
                    StoneFacetCollection::class
                ),
                StoneRelationshipsEnum::COLOURS->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_COLOURS->value,
                    StoneColourCollection::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneTypeOriginResource::class => $this->whenLoaded(StoneRelationshipsEnum::TYPE_ORIGIN->value),
            ImitationStoneResource::class => $this->whenLoaded(StoneRelationshipsEnum::IMITATION_STONE->value),
            GrownStoneResource::class => $this->whenLoaded(StoneRelationshipsEnum::GROWN_STONE->value),
            NaturalStoneResource::class => $this->whenLoaded(StoneRelationshipsEnum::NATURAL_STONE->value),
            StoneFacetCollection::class => $this->whenLoaded(StoneRelationshipsEnum::FACETS->value),
            StoneColourCollection::class => $this->whenLoaded(StoneRelationshipsEnum::COLOURS->value),
        ];
    }
}
