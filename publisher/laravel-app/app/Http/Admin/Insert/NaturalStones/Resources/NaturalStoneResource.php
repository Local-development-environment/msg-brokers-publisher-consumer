<?php

namespace App\Http\Admin\Insert\NaturalStones\Resources;

use App\Http\Admin\Insert\NaturalStoneGrades\Resources\NaturalStoneGradeResource;
use App\Http\Admin\Insert\StoneFamilies\Resources\StoneFamilyResource;
use App\Http\Admin\Insert\StoneGroups\Resources\StoneGroupResource;
use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\NaturalStones\Enums\NatureStoneEnum;
use Domain\Inserts\NaturalStones\Enums\NatureStoneNameRoutesEnum;
use Domain\Inserts\NaturalStones\Enums\NatureStoneRelationshipsEnum;
use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin NaturalStone */
class NaturalStoneResource extends JsonResource
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
            'type' => NatureStoneEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                NatureStoneRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    NatureStoneNameRoutesEnum::RELATED_TO_STONE->value,
                    StoneResource::class
                ),
                NatureStoneRelationshipsEnum::NATURAL_STONE_GRADE->value => $this->sectionRelationships(
                    NatureStoneNameRoutesEnum::RELATED_TO_NATURAL_STONE_GRADE->value,
                    NaturalStoneGradeResource::class
                ),
                NatureStoneRelationshipsEnum::STONE_GROUP->value => $this->sectionRelationships(
                    NatureStoneNameRoutesEnum::RELATED_TO_STONE_GROUP->value,
                    StoneGroupResource::class
                ),
                NatureStoneRelationshipsEnum::STONE_FAMILY->value => $this->sectionRelationships(
                    NatureStoneNameRoutesEnum::RELATED_TO_STONE_FAMILY->value,
                    StoneFamilyResource::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneResource::class => $this->whenLoaded(NatureStoneRelationshipsEnum::STONE->value),
            NaturalStoneGradeResource::class => $this->whenLoaded(NatureStoneRelationshipsEnum::NATURAL_STONE_GRADE->value),
            StoneGroupResource::class => $this->whenLoaded(NatureStoneRelationshipsEnum::STONE_GROUP->value),
            StoneFamilyResource::class => $this->whenLoaded(NatureStoneRelationshipsEnum::STONE_FAMILY->value),
        ];
    }
}
