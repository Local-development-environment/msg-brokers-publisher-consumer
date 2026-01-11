<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingDetails\Resources;

use App\Http\Admin\SpecProperties\Rings\Ring\Resources\RingResource;
use App\Http\Admin\SpecProperties\Rings\RingTypes\Resources\RingTypeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Rings\RingDetails\Enums\RingDetailNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingDetails\Enums\RingDetailRelationshipsEnum;
use Domain\JewelleryProperties\Rings\RingDetails\Models\RingDetail;
use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
