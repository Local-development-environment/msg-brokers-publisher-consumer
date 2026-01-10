<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\Ring\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\SpecProperties\Rings\RingDetails\Resources\RingDetailResource;
use App\Http\Admin\SpecProperties\Rings\RingFingers\Resources\RingFingerResource;
use App\Http\Admin\SpecProperties\Rings\RingMetrics\Resources\RingMetricResource;
use App\Http\Admin\SpecProperties\Rings\RingSizes\Resources\RingSizeResource;
use App\Http\Admin\SpecProperties\Rings\RingTypes\Resources\RingTypeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Rings\Rings\Enums\RingNameRoutesEnum;
use Domain\JewelleryProperties\Rings\Rings\Enums\RingRelationshipsEnum;
use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Ring */
final class RingResource extends JsonResource
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
            'type' => Ring::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                RingRelationshipsEnum::JEWELLERY->value => $this->sectionRelationships(
                    RingNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    RingRelationshipsEnum::JEWELLERY->value
                ),
                RingRelationshipsEnum::RING_DETAILS->value => $this->sectionRelationships(
                    RingNameRoutesEnum::RELATED_TO_RING_DETAILS->value,
                    RingRelationshipsEnum::RING_DETAILS->value
                ),
                RingRelationshipsEnum::RING_METRICS->value => $this->sectionRelationships(
                    RingNameRoutesEnum::RELATED_TO_RING_METRICS->value,
                    RingRelationshipsEnum::RING_METRICS->value
                ),
                RingRelationshipsEnum::RING_SIZES->value => $this->sectionRelationships(
                    RingNameRoutesEnum::RELATED_TO_RING_SIZES->value,
                    RingRelationshipsEnum::RING_SIZES->value
                ),
                RingRelationshipsEnum::RING_TYPES->value => $this->sectionRelationships(
                    RingNameRoutesEnum::RELATED_TO_RING_TYPES->value,
                    RingRelationshipsEnum::RING_TYPES->value
                ),
                RingRelationshipsEnum::RING_FINGER->value => $this->sectionRelationships(
                    RingNameRoutesEnum::RELATED_TO_RING_FINGER->value,
                    RingRelationshipsEnum::RING_FINGER->value
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new JewelleryResource($this->whenLoaded(RingRelationshipsEnum::JEWELLERY->value)),
            new RingFingerResource($this->whenLoaded(RingRelationshipsEnum::RING_FINGER->value)),
            RingDetailResource::collection($this->whenLoaded(RingRelationshipsEnum::RING_DETAILS->value)),
            RingMetricResource::collection($this->whenLoaded(RingRelationshipsEnum::RING_METRICS->value)),
            RingSizeResource::collection($this->whenLoaded(RingRelationshipsEnum::RING_SIZES->value)),
            RingTypeResource::collection($this->whenLoaded(RingRelationshipsEnum::RING_TYPES->value)),
        ];
    }
}
