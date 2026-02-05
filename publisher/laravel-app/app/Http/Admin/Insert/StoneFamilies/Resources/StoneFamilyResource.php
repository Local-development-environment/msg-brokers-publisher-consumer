<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneFamilies\Resources;

use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneResource;
use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Enums\StoneFamilyEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Enums\StoneFamilyNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Enums\StoneFamilyRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models\StoneFamily;

/** @mixin StoneFamily */
final class StoneFamilyResource extends JsonResource
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
            'type' => StoneFamilyEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneFamilyRelationshipsEnum::GROWN_STONES->value => $this->sectionRelationships(
                    StoneFamilyNameRoutesEnum::RELATED_TO_GROWN_STONES->value,
                    StoneFamilyRelationshipsEnum::GROWN_STONES->value
                ),
                StoneFamilyRelationshipsEnum::NATURAL_STONES->value => $this->sectionRelationships(
                    StoneFamilyNameRoutesEnum::RELATED_TO_NATURAL_STONES->value,
                    StoneFamilyRelationshipsEnum::NATURAL_STONES->value
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            GrownStoneResource::collection($this->whenLoaded(StoneFamilyRelationshipsEnum::GROWN_STONES->value)),
            NaturalStoneResource::collection($this->whenLoaded(StoneFamilyRelationshipsEnum::NATURAL_STONES->value)),
        ];
    }
}
