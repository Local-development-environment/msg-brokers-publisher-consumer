<?php

namespace App\Http\Admin\Insert\ImitationStones\Resources;

use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneNameRoutesEnum;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneRelationshipsEnum;
use Domain\Inserts\ImitationStones\Models\ImitationStone;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ImitationStone */
class ImitationStoneResource extends JsonResource
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
            'type' => ImitationStoneEnum::TYPE_TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                ImitationStoneRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    ImitationStoneNameRoutesEnum::RELATED_TO_STONE->value,
                    StoneResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneResource::class => $this->whenLoaded(ImitationStoneRelationshipsEnum::STONE->value)
        ];
    }
}
