<?php

namespace App\Http\Admin\Insert\NaturalStoneGrades\Resources;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Admin\Insert\StoneGrades\Resources\StoneGradeResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\GroupGrades\Enums\GroupGradeEnum;
use Domain\Inserts\GroupGrades\Enums\GroupGradeNameRoutsEnum;
use Domain\Inserts\GroupGrades\Enums\GroupGradeRelationshipsEnum;
use Domain\Inserts\GroupGrades\Models\GroupGrade;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin GroupGrade */
class NaturalStoneGradeResource extends JsonResource
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
            'type' => GroupGradeEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                GroupGradeRelationshipsEnum::STONE_GRADE->value => $this->sectionRelationships(
                    GroupGradeNameRoutsEnum::RELATED_TO_STONE_GRADE->value,
                    StoneGradeResource::class
                ),
                GroupGradeRelationshipsEnum::NATURAL_STONE->value => $this->sectionRelationships(
                    GroupGradeNameRoutsEnum::RELATED_TO_NATURAL_STONE->value,
                    NaturalStoneResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneGradeResource::class => $this->whenLoaded(GroupGradeRelationshipsEnum::STONE_GRADE->value),
            NaturalStoneResource::class => $this->whenLoaded(GroupGradeRelationshipsEnum::NATURAL_STONE->value),
        ];
    }
}
