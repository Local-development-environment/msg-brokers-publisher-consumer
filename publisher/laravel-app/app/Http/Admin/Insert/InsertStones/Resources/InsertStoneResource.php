<?php

namespace App\Http\Admin\Insert\InsertStones\Resources;

use App\Http\Admin\Insert\Inserts\Resources\InsertCollection;
use App\Http\Admin\Insert\StoneColours\Resources\StoneColourResource;
use App\Http\Admin\Insert\StoneFacets\Resources\StoneFacetResource;
use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\InsertStones\Enums\InsertStoneEnum;
use Domain\Inserts\InsertStones\Enums\InsertStoneNameRoutesEnum;
use Domain\Inserts\InsertStones\Enums\InsertStoneRelationshipsEnum;
use Domain\Inserts\InsertStones\Models\InsertStone;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin InsertStone */
class InsertStoneResource extends JsonResource
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
            'type' => InsertStoneEnum::RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                InsertStoneRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    InsertStoneNameRoutesEnum::RELATED_TO_STONE->value,
                    StoneResource::class
                ),
                InsertStoneRelationshipsEnum::INSERTS->value => $this->sectionRelationships(
                    InsertStoneNameRoutesEnum::RELATED_TO_INSERTS->value,
                    InsertCollection::class
                ),
                InsertStoneRelationshipsEnum::STONE_FACET->value => $this->sectionRelationships(
                    InsertStoneNameRoutesEnum::RELATED_TO_STONE_FACET->value,
                    StoneFacetResource::class
                ),
                InsertStoneRelationshipsEnum::STONE_COLOUR->value => $this->sectionRelationships(
                    InsertStoneNameRoutesEnum::RELATED_TO_STONE_COLOUR->value,
                    StoneColourResource::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneResource::class => $this->whenLoaded(InsertStoneRelationshipsEnum::STONE->value),
            InsertCollection::class => $this->whenLoaded(InsertStoneRelationshipsEnum::INSERTS->value),
            StoneFacetResource::class => $this->whenLoaded(InsertStoneRelationshipsEnum::STONE_FACET->value),
            StoneColourResource::class => $this->whenLoaded(InsertStoneRelationshipsEnum::STONE_COLOUR->value),
        ];
    }
}
