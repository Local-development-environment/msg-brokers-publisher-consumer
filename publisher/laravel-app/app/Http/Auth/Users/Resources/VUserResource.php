<?php
declare(strict_types=1);

namespace App\Http\Auth\Users\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Auth\Users\Enums\VUserEnum;
use Domain\Auth\Users\Models\VUser;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin VUser */
class VUserResource extends JsonResource
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
            'type' => VUserEnum::RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
//                VUserRelationshipsEnum::STONE_FAMILY->value => $this->sectionRelationships(
//                    GrownStoneNameRoutesEnum::RELATED_TO_STONE_FAMILY->value,
//                    StoneFamilyResource::class
//                ),
//                GrownStoneRelationshipsEnum::STONE->value => $this->sectionRelationships(
//                    GrownStoneNameRoutesEnum::RELATED_TO_STONE->value,
//                    StoneResource::class
//                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
//            StoneFamilyResource::class => $this->whenLoaded(GrownStoneRelationshipsEnum::STONE_FAMILY->value),
//            StoneResource::class => $this->whenLoaded(GrownStoneRelationshipsEnum::STONE->value),
        ];
    }
}
