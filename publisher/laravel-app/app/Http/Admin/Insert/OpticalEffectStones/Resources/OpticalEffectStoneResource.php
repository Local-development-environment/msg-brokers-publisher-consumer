<?php

namespace App\Http\Admin\Insert\OpticalEffectStones\Resources;

use App\Http\Admin\Insert\OpticalEffects\Resources\OpticalEffectResource;
use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\OpticalEffectStones\Enums\OpticalEffectStoneEnum;
use Domain\Inserts\OpticalEffectStones\Enums\OpticalEffectStoneNameRoutesEnum;
use Domain\Inserts\OpticalEffectStones\Enums\OpticalEffectStoneRelationshipsEnum;
use Domain\Inserts\OpticalEffectStones\Models\OpticalEffectStone;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin OpticalEffectStone */
class OpticalEffectStoneResource extends JsonResource
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
            'type' => OpticalEffectStoneEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                OpticalEffectStoneEnum::TYPE_RESOURCE->value => $this->sectionRelationships(
                    OpticalEffectStoneNameRoutesEnum::RELATED_TO_OPTICAL_EFFECT->value,
                    OpticalEffectResource::class
                ),
                OpticalEffectStoneRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    OpticalEffectStoneNameRoutesEnum::RELATED_TO_STONE->value,
                    StoneResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            OpticalEffectResource::class => $this->whenLoaded(OpticalEffectStoneRelationshipsEnum::OPTICAL_EFFECT->value),
            StoneResource::class => $this->whenLoaded(OpticalEffectStoneRelationshipsEnum::STONE->value),
        ];
    }
}
