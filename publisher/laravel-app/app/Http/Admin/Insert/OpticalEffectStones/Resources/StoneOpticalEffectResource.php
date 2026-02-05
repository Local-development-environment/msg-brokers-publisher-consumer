<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\OpticalEffectStones\Resources;

use App\Http\Admin\Insert\OpticalEffects\Resources\OpticalEffectResource;
use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Enums\StoneOpticalEffectEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Enums\StoneOpticalEffectNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Enums\StoneOpticalEffectRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Models\StoneOpticalEffect;

/** @mixin StoneOpticalEffect */
final class StoneOpticalEffectResource extends JsonResource
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
            'type' => StoneOpticalEffectEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneOpticalEffectRelationshipsEnum::OPTICAL_EFFECT->value      => $this->sectionRelationships(
                    StoneOpticalEffectNameRoutesEnum::RELATED_TO_OPTICAL_EFFECT->value,
                    StoneOpticalEffectRelationshipsEnum::OPTICAL_EFFECT->value
                ),
                StoneOpticalEffectRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    StoneOpticalEffectNameRoutesEnum::RELATED_TO_STONE->value,
                    StoneOpticalEffectRelationshipsEnum::STONE->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new OpticalEffectResource($this->whenLoaded(StoneOpticalEffectRelationshipsEnum::OPTICAL_EFFECT->value)),
            new StoneResource($this->whenLoaded(StoneOpticalEffectRelationshipsEnum::STONE->value)),
        ];
    }
}
