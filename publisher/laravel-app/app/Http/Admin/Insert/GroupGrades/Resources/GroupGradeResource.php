<?php

declare(strict_types=1);

namespace App\Http\Admin\Insert\GroupGrades\Resources;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Admin\Insert\StoneGroups\Resources\StoneGroupResource;
use App\Http\Admin\Insert\StoneItemGrades\Resources\StoneItemGradeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Enums\GroupGradeNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Enums\GroupGradeRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models\GroupGrade;

/** @mixin GroupGrade */
final class GroupGradeResource extends JsonResource
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
            'type' => GroupGrade::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                GroupGradeRelationshipsEnum::STONE_GROUP->value => $this->sectionRelationships(
                    GroupGradeNameRoutesEnum::RELATED_TO_STONE_GROUP->value,
                    GroupGradeRelationshipsEnum::STONE_GROUP->value
                ),
                GroupGradeRelationshipsEnum::STONE_ITEM_GRADE->value => $this->sectionRelationships(
                    GroupGradeNameRoutesEnum::RELATED_TO_STONE_ITEM_GRADE->value,
                    GroupGradeRelationshipsEnum::STONE_ITEM_GRADE->value
                ),
                GroupGradeRelationshipsEnum::NATURAL_STONE->value => $this->sectionRelationships(
                    GroupGradeNameRoutesEnum::RELATED_TO_NATURAL_STONE->value,
                    GroupGradeRelationshipsEnum::NATURAL_STONE->value
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new StoneGroupResource($this->whenLoaded(GroupGradeRelationshipsEnum::STONE_GROUP->value)),
            new StoneItemGradeResource($this->whenLoaded(GroupGradeRelationshipsEnum::STONE_ITEM_GRADE->value)),
            new NaturalStoneResource($this->whenLoaded(GroupGradeRelationshipsEnum::NATURAL_STONE->value)),
        ];
    }
}
