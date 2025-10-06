<?php

namespace App\Http\Admin\Insert\OpticalEffects\Resources;

use App\Http\Admin\Insert\OpticalEffectStones\Resources\OpticalEffectStoneCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectNameRoutesEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectRelationshipsEnum;
use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin OpticalEffect */
class OpticalEffectResource extends JsonResource
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
            'type' => OpticalEffectEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                OpticalEffectRelationshipsEnum::OPTICAL_EFFECT_STONES->value => $this->sectionRelationships(
                    OpticalEffectNameRoutesEnum::RELATED_TO_OPTICAL_EFFECT_STONES->value,
                    OpticalEffectStoneCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            OpticalEffectStoneCollection::class => $this->whenLoaded(OpticalEffectRelationshipsEnum::OPTICAL_EFFECT_STONES->value),
        ];
    }
}
