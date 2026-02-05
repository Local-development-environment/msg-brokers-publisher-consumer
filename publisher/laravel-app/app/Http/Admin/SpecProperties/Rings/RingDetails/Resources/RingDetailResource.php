<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingDetails\Resources;

use App\Http\Admin\SpecProperties\Rings\Ring\Resources\RingResource;
use App\Http\Admin\SpecProperties\Rings\RingTypes\Resources\RingTypeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Enums\RingDetailNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Enums\RingDetailRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Models\RingDetail;

/** @mixin RingDetail */
final class RingDetailResource extends JsonResource
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
            'type' => RingDetail::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                RingDetailRelationshipsEnum::RING_TYPE->value => $this->sectionRelationships(
                    RingDetailNameRoutesEnum::RELATED_TO_RING_TYPE->value,
                    RingDetailRelationshipsEnum::RING_TYPE->value
                ),
                RingDetailRelationshipsEnum::RING->value => $this->sectionRelationships(
                    RingDetailNameRoutesEnum::RELATED_TO_RING->value,
                    RingDetailRelationshipsEnum::RING->value
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new RingTypeResource($this->whenLoaded(RingDetailRelationshipsEnum::RING_TYPE->value)),
            new RingResource($this->whenLoaded(RingDetailRelationshipsEnum::RING->value)),
        ];
    }
}
