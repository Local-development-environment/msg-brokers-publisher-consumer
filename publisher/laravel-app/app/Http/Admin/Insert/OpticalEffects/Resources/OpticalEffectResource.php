<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\OpticalEffects\Resources;

use App\Http\Admin\Insert\OpticalEffectStones\Resources\StoneOpticalEffectResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Enums\OpticalEffectEnum;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Enums\OpticalEffectNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Enums\OpticalEffectRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Models\OpticalEffect;

/** @mixin OpticalEffect */
final class OpticalEffectResource extends JsonResource
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
            'type' => OpticalEffectEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                OpticalEffectRelationshipsEnum::STONE_OPTICAL_EFFECTS->value => $this->sectionRelationships(
                    OpticalEffectNameRoutesEnum::RELATED_TO_STONE_OPTICAL_EFFECTS->value,
                    OpticalEffectRelationshipsEnum::STONE_OPTICAL_EFFECTS->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneOpticalEffectResource::collection(
                $this->whenLoaded(OpticalEffectRelationshipsEnum::STONE_OPTICAL_EFFECTS->value)),
        ];
    }
}
