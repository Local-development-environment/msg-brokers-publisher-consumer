<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingMetrics\Resources;

use App\Http\Admin\SpecProperties\Rings\Ring\Resources\RingResource;
use App\Http\Admin\SpecProperties\Rings\RingSizes\Resources\RingSizeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Enums\RingMetricNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Enums\RingMetricRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Models\RingMetric;

/** @mixin RingMetric */
final class RingMetricResource extends JsonResource
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
            'type' => RingMetric::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                RingMetricRelationshipsEnum::RING_SIZE->value => $this->sectionRelationships(
                    RingMetricNameRoutesEnum::RELATED_TO_RING_SIZE->value,
                    RingMetricRelationshipsEnum::RING_SIZE->value,
                ),
                RingMetricRelationshipsEnum::RING->value => $this->sectionRelationships(
                    RingMetricNameRoutesEnum::RELATED_TO_RING->value,
                    RingMetricRelationshipsEnum::RING->value,
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new RingSizeResource($this->whenLoaded(RingMetricRelationshipsEnum::RING_SIZE->value)),
            new RingResource($this->whenLoaded(RingMetricRelationshipsEnum::RING->value)),
        ];
    }
}
