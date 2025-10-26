<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Inserts\Resources;

use App\Http\Admin\Insert\InsertStones\Resources\InsertStoneResource;
use App\Http\Admin\Insert\InsertOptionalInfos\Resources\InsertOptionalInfoResource;
use App\Http\Admin\Insert\StoneMetrics\Resources\StoneMetricResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\Inserts\Enums\InsertNameRoutesEnum;
use Domain\Inserts\Inserts\Enums\InsertRelationshipsEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class InsertResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => InsertEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
//                InsertRelationshipsEnum::JEWELLERY->value => $this->sectionRelationships(
//                    InsertNameRoutesEnum::RELATED_TO_JEWELLERY->value,
//                    JewelleryResource::class
//                ),
                InsertRelationshipsEnum::INSERT_OPTIONAL_INFO->value => $this->sectionRelationships(
                    InsertNameRoutesEnum::RELATED_TO_INSERT_OPTIONAL_INFO->value,
                    InsertOptionalInfoResource::class
                ),
                InsertRelationshipsEnum::INSERT_STONE->value => $this->sectionRelationships(
                    InsertNameRoutesEnum::RELATED_TO_INSERT_STONE->value,
                    InsertStoneResource::class
                ),
                InsertRelationshipsEnum::METRIC->value => $this->sectionRelationships(
                    InsertNameRoutesEnum::RELATED_TO_METRIC->value,
                    StoneMetricResource::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
//            JewelleryResource::class => $this->whenLoaded(InsertRelationshipsEnum::JEWELLERY->value),
            InsertOptionalInfoResource::class => $this->whenLoaded(InsertRelationshipsEnum::INSERT_OPTIONAL_INFO->value),
            InsertStoneResource::class => $this->whenLoaded(InsertRelationshipsEnum::INSERT_STONE->value),
            StoneMetricResource::class => $this->whenLoaded(InsertRelationshipsEnum::METRIC->value),
        ];
    }
}
