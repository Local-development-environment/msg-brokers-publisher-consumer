<?php

namespace App\Http\Admin\Jewellery\Jewelleries\Resources;

use App\Http\Admin\BeadProperty\Beads\Resources\BeadResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryNameRoutesEnum;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryRelationshipsEnum;
use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Jewellery */
class JewelleryResource extends JsonResource
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
            'type' => Jewellery::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'bead' => $this->sectionRelationships(
                    JewelleryNameRoutesEnum::RELATED_TO_BEAD->value,
                    BeadResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            BeadResource::class => $this->whenLoaded(JewelleryRelationshipsEnum::BEAD->value),
        ];
    }
}
