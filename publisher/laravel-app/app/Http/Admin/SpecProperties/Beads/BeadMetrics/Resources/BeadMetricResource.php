<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadMetrics\Resources;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Enums\BeadMetricNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Enums\BeadMetricRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Models\BeadMetric;

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
