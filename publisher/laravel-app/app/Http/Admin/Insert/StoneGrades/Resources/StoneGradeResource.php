<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneGrades\Resources;

use App\Http\Admin\Insert\StoneItemGrades\Resources\StoneItemGradeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Enums\StoneGradeEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Enums\StoneGradeNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Enums\StoneGradeRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Models\StoneGrade;

/** @mixin StoneGrade */
final class StoneGradeResource extends JsonResource
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
            'type' => StoneGradeEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneGradeRelationshipsEnum::STONE_ITEM_GRADES->value => $this->sectionRelationships(
                    StoneGradeNameRoutesEnum::RELATED_TO_STONE_ITEM_GRADES->value,
                    StoneGradeRelationshipsEnum::STONE_ITEM_GRADES->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneItemGradeResource::collection($this->whenLoaded(StoneGradeRelationshipsEnum::STONE_ITEM_GRADES->value)),
        ];
    }
}
