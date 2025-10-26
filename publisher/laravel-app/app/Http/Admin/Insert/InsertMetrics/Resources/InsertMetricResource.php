<?php

namespace App\Http\Admin\Insert\InsertMetrics\Resources;

use App\Http\Admin\Insert\Inserts\Resources\InsertResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\InsertMetrics\Enums\InsertMetricEnum;
use Domain\Inserts\InsertMetrics\Enums\InsertMetricNameRoutesEnum;
use Domain\Inserts\InsertMetrics\Enums\InsertMetricRelationshipsEnum;
use Domain\Inserts\InsertMetrics\Models\InsertMetric;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin InsertMetric */
class InsertMetricResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => InsertMetricEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                InsertMetricRelationshipsEnum::INSERT->value => $this->sectionRelationships(
                    InsertMetricNameRoutesEnum::RELATED_TO_INSERT->value,
                    InsertResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            InsertResource::class => $this->whenLoaded(InsertMetricRelationshipsEnum::INSERT->value),
        ];
    }
}
