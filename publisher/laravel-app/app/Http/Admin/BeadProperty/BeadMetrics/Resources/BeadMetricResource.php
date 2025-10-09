<?php

namespace App\Http\Admin\BeadProperty\BeadMetrics\Resources;

use App\Http\Admin\BeadProperty\Beads\Resources\BeadResource;
use App\Http\Admin\BeadProperty\BeadSizes\Resources\BeadSizeResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricRelationshipsEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BeadMetric */
class BeadMetricResource extends JsonResource
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
            'type' => BeadMetric::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'bead' => $this->sectionRelationships(
                    BeadMetricNameRoutesEnum::RELATED_TO_BEAD->value,
                    BeadResource::class
                ),
                'beadSize' => $this->sectionRelationships(
                    BeadMetricNameRoutesEnum::RELATED_TO_BEAD_SIZE->value,
                    BeadSizeResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            BeadResource::class => $this->whenLoaded(BeadMetricRelationshipsEnum::BEAD->value),
            BeadSizeResource::class => $this->whenLoaded(BeadMetricRelationshipsEnum::BEAD_SIZE->value),
        ];
    }
}
