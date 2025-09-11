<?php

namespace App\Http\Admin\Insert\StoneMetrics\Resources;

use App\Http\Admin\Insert\Inserts\Resources\InsertResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\StoneMetrics\Enums\StoneMetricEnum;
use Domain\Inserts\StoneMetrics\Enums\StoneMetricNameRoutesEnum;
use Domain\Inserts\StoneMetrics\Enums\StoneMetricRelationshipsEnum;
use Domain\Inserts\StoneMetrics\Models\StoneMetric;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin StoneMetric */
class StoneMetricResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => StoneMetricEnum::RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneMetricRelationshipsEnum::INSERT->value => $this->sectionRelationships(
                    StoneMetricNameRoutesEnum::RELATED_TO_INSERT->value,
                    InsertResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            InsertResource::class => $this->whenLoaded(StoneMetricRelationshipsEnum::INSERT->value),
        ];
    }
}
