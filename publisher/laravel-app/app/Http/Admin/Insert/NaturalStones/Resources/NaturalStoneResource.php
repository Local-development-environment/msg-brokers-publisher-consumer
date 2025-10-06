<?php

namespace App\Http\Admin\Insert\NaturalStones\Resources;

use App\Http\Admin\Insert\NaturalStoneGrades\Resources\NaturalStoneGradeResource;
use App\Http\Admin\Insert\StoneFamilies\Resources\StoneFamilyResource;
use App\Http\Admin\Insert\StoneGroups\Resources\StoneGroupResource;
use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\NaturalStones\Enums\NaturalStoneEnum;
use Domain\Inserts\NaturalStones\Enums\NaturalStoneNameRoutesEnum;
use Domain\Inserts\NaturalStones\Enums\NaturalStoneRelationshipsEnum;
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
            'type' => NaturalStoneEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                NaturalStoneRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    NaturalStoneNameRoutesEnum::RELATED_TO_STONE->value,
                    StoneResource::class
                ),
                NaturalStoneRelationshipsEnum::NATURAL_STONE_GRADE->value => $this->sectionRelationships(
                    NaturalStoneNameRoutesEnum::RELATED_TO_NATURAL_STONE_GRADE->value,
                    NaturalStoneGradeResource::class
                ),
                NaturalStoneRelationshipsEnum::STONE_GROUP->value => $this->sectionRelationships(
                    NaturalStoneNameRoutesEnum::RELATED_TO_STONE_GROUP->value,
                    StoneGroupResource::class
                ),
                NaturalStoneRelationshipsEnum::STONE_FAMILY->value => $this->sectionRelationships(
                    NaturalStoneNameRoutesEnum::RELATED_TO_STONE_FAMILY->value,
                    StoneFamilyResource::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneResource::class => $this->whenLoaded(NaturalStoneRelationshipsEnum::STONE->value),
            NaturalStoneGradeResource::class => $this->whenLoaded(NaturalStoneRelationshipsEnum::NATURAL_STONE_GRADE->value),
            StoneGroupResource::class => $this->whenLoaded(NaturalStoneRelationshipsEnum::STONE_GROUP->value),
            StoneFamilyResource::class => $this->whenLoaded(NaturalStoneRelationshipsEnum::STONE_FAMILY->value),
        ];
    }
}
