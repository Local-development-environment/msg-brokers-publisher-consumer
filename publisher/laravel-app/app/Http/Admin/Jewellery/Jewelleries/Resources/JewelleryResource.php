<?php
declare(strict_types=1);

namespace App\Http\Admin\Jewellery\Jewelleries\Resources;

use App\Http\Admin\Jewellery\Categories\Resources\JewelleryCategoryResource;
use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadResource;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources\BraceletResource;
use app\Http\Admin\SpecProperties\Brooches\Brooch\Resources\BroochResource;
use App\Http\Admin\SpecProperties\Chains\Chain\Resources\ChainResource;
use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Resources\CharmPendantResource;
use App\Http\Admin\SpecProperties\Pendants\Pendants\Resources\PendantResource;
use App\Http\Admin\SpecProperties\Rings\Ring\Resources\RingResource;
use App\Http\Admin\SpecProperties\TieClips\TieClip\Resources\TieClipResource;
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
                JewelleryRelationshipsEnum::JEWELLERY_CATEGORY->value => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_JEWELLERY_CATEGORY->value,
                    JewelleryRelationshipsEnum::JEWELLERY_CATEGORY->value,
                ),
                JewelleryRelationshipsEnum::BEAD->value => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_BEAD->value,
                    JewelleryRelationshipsEnum::BEAD->value,
                ),
                JewelleryRelationshipsEnum::BRACELET->value => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_BRACELET->value,
                    JewelleryRelationshipsEnum::BRACELET->value,
                ),
                JewelleryRelationshipsEnum::CHAIN->value => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_CHAIN->value,
                    JewelleryRelationshipsEnum::CHAIN->value,
                ),
                JewelleryRelationshipsEnum::BROOCH->value => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_BROOCH->value,
                    JewelleryRelationshipsEnum::BROOCH->value,
                ),
                JewelleryRelationshipsEnum::RING->value => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_RING->value,
                    JewelleryRelationshipsEnum::RING->value,
                ),
                JewelleryRelationshipsEnum::CHARM_PENDANT->value => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_CHARM_PENDANT->value,
                    JewelleryRelationshipsEnum::CHARM_PENDANT->value,
                ),
                JewelleryRelationshipsEnum::PENDANT->value => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_PENDANT->value,
                    JewelleryRelationshipsEnum::PENDANT->value,
                ),
                JewelleryRelationshipsEnum::TIE_CLIP->value => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_TIE_CLIP->value,
                    JewelleryRelationshipsEnum::TIE_CLIP->value,
                ),
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
            new BroochResource($this->whenLoaded(JewelleryRelationshipsEnum::BROOCH->value)),
            new RingResource($this->whenLoaded(JewelleryRelationshipsEnum::RING->value)),
            new CharmPendantResource($this->whenLoaded(JewelleryRelationshipsEnum::CHARM_PENDANT->value)),
            new PendantResource($this->whenLoaded(JewelleryRelationshipsEnum::PENDANT->value)),
            new TieClipResource($this->whenLoaded(JewelleryRelationshipsEnum::TIE_CLIP->value)),
        ];
    }
}
