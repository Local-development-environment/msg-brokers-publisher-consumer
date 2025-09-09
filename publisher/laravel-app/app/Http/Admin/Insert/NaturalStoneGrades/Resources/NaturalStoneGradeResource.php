<?php

namespace App\Http\Admin\Insert\NaturalStoneGrades\Resources;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Admin\Insert\StoneGrades\Resources\StoneGradeResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\NaturalStoneGrades\Enums\NaturalStoneGradeEnum;
use Domain\Inserts\NaturalStoneGrades\Enums\NaturalStoneGradeNameRoutsEnum;
use Domain\Inserts\NaturalStoneGrades\Enums\NaturalStoneGradeRelationshipsEnum;
use Domain\Inserts\NaturalStoneGrades\Models\NaturalStoneGrade;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin NaturalStoneGrade */
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
            'type' => NaturalStoneGradeEnum::RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                NaturalStoneGradeRelationshipsEnum::STONE_GRADE->value => $this->sectionRelationships(
                    NaturalStoneGradeNameRoutsEnum::RELATED_TO_STONE_GRADE->value,
                    StoneGradeResource::class
                ),
                NaturalStoneGradeRelationshipsEnum::NATURAL_STONE->value => $this->sectionRelationships(
                    NaturalStoneGradeNameRoutsEnum::RELATED_TO_NATURAL_STONE->value,
                    NaturalStoneResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneGradeResource::class => $this->whenLoaded(NaturalStoneGradeRelationshipsEnum::STONE_GRADE->value),
            NaturalStoneResource::class => $this->whenLoaded(NaturalStoneGradeRelationshipsEnum::NATURAL_STONE->value),
        ];
    }
}
