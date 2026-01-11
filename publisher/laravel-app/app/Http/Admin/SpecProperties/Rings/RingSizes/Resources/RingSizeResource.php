<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingSizes\Resources;

use App\Http\Admin\SpecProperties\Rings\Ring\Resources\RingResource;
use App\Http\Admin\SpecProperties\Rings\RingMetrics\Resources\RingMetricResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeRelationshipsEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Models\RingSize;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin RingSize */
final class RingSizeResource extends JsonResource
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
            'type' => RingSize::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                RingSizeRelationshipsEnum::RINGS->value => $this->sectionRelationships(
                    RingSizeNameRoutesEnum::RELATED_TO_RINGS->value,
                    RingSizeRelationshipsEnum::RINGS->value,
                ),
                RingSizeRelationshipsEnum::RING_METRICS->value => $this->sectionRelationships(
                    RingSizeNameRoutesEnum::RELATED_TO_RING_METRICS->value,
                    RingSizeRelationshipsEnum::RING_METRICS->value,
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            RingResource::collection($this->whenLoaded(RingSizeRelationshipsEnum::RINGS->value)),
            RingMetricResource::collection($this->whenLoaded(RingSizeRelationshipsEnum::RING_METRICS->value)),
        ];
    }
}
