<?php

namespace App\Http\Admin\Insert\OptionalInfos\Resources;

use App\Http\Admin\Insert\Inserts\Resources\InsertResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\OptionalInfos\Enums\OptionalInfoEnum;
use Domain\Inserts\OptionalInfos\Enums\OptionalInfoNameRoutesEnum;
use Domain\Inserts\OptionalInfos\Enums\OptionalInfoRelationshipsEnum;
use Domain\Inserts\OptionalInfos\Models\OptionalInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin OptionalInfo */
class OptionalInfoResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => OptionalInfoEnum::RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                OptionalInfoRelationshipsEnum::INSERT->value => $this->sectionRelationships(
                    OptionalInfoNameRoutesEnum::RELATED_TO_INSERT->value,
                    InsertResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            InsertResource::class => $this->whenLoaded(OptionalInfoRelationshipsEnum::INSERT->value),
        ];
    }
}
