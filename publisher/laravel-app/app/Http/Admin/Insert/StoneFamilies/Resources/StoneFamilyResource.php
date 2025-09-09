<?php

namespace App\Http\Admin\Insert\StoneFamilies\Resources;

use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneResource;
use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyNameRoutesEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyRelationshipsEnum;
use Domain\Inserts\StoneFamilies\Models\StoneFamily;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin StoneFamily */
class StoneFamilyResource extends JsonResource
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
            'type' => StoneFamilyEnum::RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneFamilyRelationshipsEnum::GROWN_STONES->value => $this->sectionRelationships(
                    StoneFamilyNameRoutesEnum::RELATED_TO_GROWN_STONES->value,
                    GrownStoneResource::class
                ),
                StoneFamilyRelationshipsEnum::NATURAL_STONES->value => $this->sectionRelationships(
                    StoneFamilyNameRoutesEnum::RELATED_TO_NATURAL_STONES->value,
                    NaturalStoneResource::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            GrownStoneResource::class => $this->whenLoaded(StoneFamilyRelationshipsEnum::GROWN_STONES->value),
            NaturalStoneResource::class => $this->whenLoaded(StoneFamilyRelationshipsEnum::NATURAL_STONES->value),
        ];
    }
}
