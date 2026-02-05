<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\NaturalStones\Resources;

use App\Http\Admin\Insert\NaturalStoneGrades\Resources\NaturalStoneGradeResource;
use App\Http\Admin\Insert\StoneFamilies\Resources\StoneFamilyResource;
use App\Http\Admin\Insert\StoneGroups\Resources\StoneGroupResource;
use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Enums\NatureStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Enums\NatureStoneNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Enums\NatureStoneRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;

/** @mixin NaturalStone */
final class NaturalStoneResource extends JsonResource
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
            'type' => NatureStoneEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                NatureStoneRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    NatureStoneNameRoutesEnum::RELATED_TO_STONE->value,
                    NatureStoneRelationshipsEnum::STONE->value
                ),
                NatureStoneRelationshipsEnum::NATURAL_STONE_GRADE->value => $this->sectionRelationships(
                    NatureStoneNameRoutesEnum::RELATED_TO_NATURAL_STONE_GRADE->value,
                    NatureStoneRelationshipsEnum::NATURAL_STONE_GRADE->value
                ),
                NatureStoneRelationshipsEnum::STONE_GROUP->value => $this->sectionRelationships(
                    NatureStoneNameRoutesEnum::RELATED_TO_STONE_GROUP->value,
                    NatureStoneRelationshipsEnum::STONE_GROUP->value
                ),
                NatureStoneRelationshipsEnum::STONE_FAMILY->value => $this->sectionRelationships(
                    NatureStoneNameRoutesEnum::RELATED_TO_STONE_FAMILY->value,
                    NatureStoneRelationshipsEnum::STONE_FAMILY->value
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new StoneResource($this->whenLoaded(NatureStoneRelationshipsEnum::STONE->value)),
            new NaturalStoneGradeResource($this->whenLoaded(NatureStoneRelationshipsEnum::NATURAL_STONE_GRADE->value)),
            new StoneGroupResource($this->whenLoaded(NatureStoneRelationshipsEnum::STONE_GROUP->value)),
            new StoneFamilyResource($this->whenLoaded(NatureStoneRelationshipsEnum::STONE_FAMILY->value)),
        ];
    }
}
