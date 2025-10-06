<?php

namespace App\Http\Admin\Insert\StoneGroups\Resources;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\StoneGroups\Enums\StoneGroupEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupNameRoutesEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupRelationshipsEnum;
use Domain\Inserts\StoneGroups\Models\StoneGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin StoneGroup */
class StoneGroupResource extends JsonResource
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
            'type' => StoneGroupEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneGroupRelationshipsEnum::NATURAL_STONES->value => $this->sectionRelationships(
                    StoneGroupNameRoutesEnum::RELATED_TO_NATURAL_STONES->value,
                    NaturalStoneCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            NaturalStoneCollection::class => $this->whenLoaded(StoneGroupRelationshipsEnum::NATURAL_STONES->value),
        ];
    }
}
