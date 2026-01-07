<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\ChainMetrics\Resources;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Admin\SpecProperties\Chains\Chain\Resources\ChainResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Chains\ChainMetrics\Enums\ChainMetricNameRoutesEnum;
use Domain\JewelleryProperties\Chains\ChainMetrics\Enums\ChainMetricRelationshipsEnum;
use Domain\JewelleryProperties\Chains\ChainMetrics\Models\ChainMetric;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ChainMetric */
final class ChainMetricResource extends JsonResource
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
            'type' => ChainMetric::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                ChainMetricRelationshipsEnum::CHAIN->value => $this->sectionRelationships(
                    ChainMetricNameRoutesEnum::RELATED_TO_CHAIN->value,
                    ChainMetricRelationshipsEnum::CHAIN->value,
                ),
                ChainMetricRelationshipsEnum::NECK_SIZE->value => $this->sectionRelationships(
                    ChainMetricNameRoutesEnum::RELATED_TO_NECK_SIZE->value,
                    ChainMetricRelationshipsEnum::NECK_SIZE->value,
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new ChainResource($this->whenLoaded(ChainMetricRelationshipsEnum::CHAIN->value)),
            new NeckSizeResource($this->whenLoaded(ChainMetricRelationshipsEnum::NECK_SIZE->value)),
        ];
    }
}
