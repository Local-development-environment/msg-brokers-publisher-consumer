<?php
declare(strict_types=1);

namespace App\Http\Admin\Jewellery\Jewelleries\Resources;

use App\Http\Admin\Jewellery\Categories\Resources\JewelleryCategoryResource;
use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadResource;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources\BraceletResource;
use App\Http\Admin\SpecProperties\Chains\Chain\Resources\ChainResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryNameRoutesEnum;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryRelationshipsEnum;
use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Jewellery */
final class JewelleryResource extends JsonResource
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
            'type' => Jewellery::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'jewelleryCategory' => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_JEWELLERY_CATEGORY->value,
                    JewelleryRelationshipsEnum::JEWELLERY_CATEGORY->value,
                ),
                'bead' => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_BEAD->value,
                    JewelleryRelationshipsEnum::BEAD->value,
                ),
                'bracelet' => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_BRACELET->value,
                    JewelleryRelationshipsEnum::BRACELET->value,
                ),
                'chain' => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_CHAIN->value,
                    JewelleryRelationshipsEnum::CHAIN->value,
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new JewelleryCategoryResource($this->whenLoaded(JewelleryRelationshipsEnum::JEWELLERY_CATEGORY->value)),
            new BeadResource($this->whenLoaded(JewelleryRelationshipsEnum::BEAD->value)),
            new BraceletResource($this->whenLoaded(JewelleryRelationshipsEnum::BRACELET->value)),
            new ChainResource($this->whenLoaded(JewelleryRelationshipsEnum::CHAIN->value)),
        ];
    }
}
