<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadMetrics\Resources;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricRelationshipsEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Models\BeadMetric;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BeadMetric */
final class BeadMetricResource extends JsonResource
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
            'type' => BeadMetric::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                BeadMetricRelationshipsEnum::BEAD->value => $this->sectionRelationships(
                    BeadMetricNameRoutesEnum::RELATED_TO_BEAD->value,
                    BeadMetricRelationshipsEnum::BEAD->value
                ),
                BeadMetricRelationshipsEnum::NECK_SIZE->value => $this->sectionRelationships(
                    BeadMetricNameRoutesEnum::RELATED_TO_NECK_SIZE->value,
                    BeadMetricRelationshipsEnum::NECK_SIZE->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new BeadResource($this->whenLoaded(BeadMetricRelationshipsEnum::BEAD->value)),
            new NeckSizeResource($this->whenLoaded(BeadMetricRelationshipsEnum::NECK_SIZE->value)),
        ];
    }
}
