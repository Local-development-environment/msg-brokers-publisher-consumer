<?php

namespace App\Http\Admin\Insert\StoneGrades\Resources;

use App\Http\Admin\Insert\NaturalStoneGrades\Resources\NaturalStoneGradeCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\StoneGrades\Enums\StoneGradeEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeNameRoutesEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeRelationshipsEnum;
use Domain\Inserts\StoneGrades\Models\StoneGrade;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin StoneGrade */
class StoneGradeResource extends JsonResource
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
            'type' => StoneGradeEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneGradeRelationshipsEnum::NATURAL_STONE_GRADES->value => $this->sectionRelationships(
                    StoneGradeNameRoutesEnum::RELATED_TO_GROUP_GRADES->value,
                    NaturalStoneGradeCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            NaturalStoneGradeCollection::class => $this->whenLoaded(StoneGradeRelationshipsEnum::NATURAL_STONE_GRADES->value),
        ];
    }
}
