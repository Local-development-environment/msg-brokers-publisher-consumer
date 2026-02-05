<?php

declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneItemGrades\Resources;

use App\Http\Admin\Insert\GroupGrades\Resources\GroupGradeResource;
use App\Http\Admin\Insert\StoneGrades\Resources\StoneGradeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Enums\StoneItemGradeNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Enums\StoneItemGradeRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneItemGrades\Models\StoneItemGrade;

/** @mixin StoneItemGrade */
final class StoneItemGradeResource extends JsonResource
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
            'type' => StoneItemGrade::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneItemGradeRelationshipsEnum::STONE_GRADE->value => $this->sectionRelationships(
                    StoneItemGradeNameRoutesEnum::RELATED_TO_STONE_GRADE->value,
                    StoneItemGradeRelationshipsEnum::STONE_GRADE->value
                ),
                StoneItemGradeRelationshipsEnum::GROUP_GRADE->value => $this->sectionRelationships(
                    StoneItemGradeNameRoutesEnum::RELATED_TO_GROUP_GRADE->value,
                    StoneItemGradeRelationshipsEnum::GROUP_GRADE->value
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new StoneGradeResource($this->whenLoaded(StoneItemGradeRelationshipsEnum::STONE_GRADE->value)),
            new GroupGradeResource($this->whenLoaded(StoneItemGradeRelationshipsEnum::GROUP_GRADE->value)),
        ];
    }
}
