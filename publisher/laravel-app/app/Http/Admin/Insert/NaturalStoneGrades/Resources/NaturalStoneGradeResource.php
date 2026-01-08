<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\NaturalStoneGrades\Resources;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Admin\Insert\StoneGrades\Resources\StoneGradeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Inserts\GroupGrades\Enums\GroupGradeEnum;
use Domain\Inserts\GroupGrades\Enums\GroupGradeNameRoutsEnum;
use Domain\Inserts\GroupGrades\Enums\GroupGradeRelationshipsEnum;
use Domain\Inserts\GroupGrades\Models\GroupGrade;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin GroupGrade */
final class NaturalStoneGradeResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

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
                    GroupGradeRelationshipsEnum::STONE_GRADE->value
                ),
                GroupGradeRelationshipsEnum::NATURAL_STONE->value => $this->sectionRelationships(
                    GroupGradeNameRoutsEnum::RELATED_TO_NATURAL_STONE->value,
                    GroupGradeRelationshipsEnum::NATURAL_STONE->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new StoneGradeResource($this->whenLoaded(GroupGradeRelationshipsEnum::STONE_GRADE->value)),
            new NaturalStoneResource($this->whenLoaded(GroupGradeRelationshipsEnum::NATURAL_STONE->value)),
        ];
    }
}
