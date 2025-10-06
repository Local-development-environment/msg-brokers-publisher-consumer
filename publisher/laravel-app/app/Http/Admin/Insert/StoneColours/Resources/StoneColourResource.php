<?php

namespace App\Http\Admin\Insert\StoneColours\Resources;

use App\Http\Admin\Insert\InsertStones\Resources\InsertStoneCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\StoneColours\Enums\StoneColourEnum;
use Domain\Inserts\StoneColours\Enums\StoneColourNameRoutesEnum;
use Domain\Inserts\StoneColours\Enums\StoneColourRelationshipsEnum;
use Domain\Inserts\StoneColours\Models\StoneColour;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin StoneColour */
class StoneColourResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => StoneColourEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneColourRelationshipsEnum::INSERT_STONES->value => $this->sectionRelationships(
                    StoneColourNameRoutesEnum::RELATED_TO_INSERT_STONES->value,
                    InsertStoneCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            InsertStoneCollection::class => $this->whenLoaded(StoneColourRelationshipsEnum::INSERT_STONES->value),
        ];
    }
}
