<?php
declare(strict_types=1);

namespace App\Http\Admin\NecklaceProperty\NecklaceMetrics\Resources;

use App\Http\Admin\NecklaceProperty\Necklaces\Resources\NecklaceResource;
use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums\NecklaceMetricNameRoutesEnum;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums\NecklaceMetricRelationshipsEnum;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Models\NecklaceMetric;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin NecklaceMetric */
final class NecklaceMetricResource extends JsonResource
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
            'type' => NecklaceMetric::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'necklace' => $this->sectionRelationships(
                    NecklaceMetricNameRoutesEnum::RELATED_TO_NECKLACE->value,
                    NecklaceMetricRelationshipsEnum::NECKLACE->value
                ),
                'necklaceSize' => $this->sectionRelationships(
                    NecklaceMetricNameRoutesEnum::RELATED_TO_NECK_SIZE->value,
                    NecklaceMetricRelationshipsEnum::NECK_SIZE->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            NecklaceResource::collection([$this->whenLoaded(NecklaceMetricRelationshipsEnum::NECKLACE->value)]),
            NeckSizeResource::collection([$this->whenLoaded(NecklaceMetricRelationshipsEnum::NECK_SIZE->value)]),
        ];
    }
}
