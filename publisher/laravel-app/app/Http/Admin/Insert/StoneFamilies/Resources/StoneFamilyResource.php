<?php

namespace App\Http\Admin\Insert\StoneFamilies\Resources;

use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneCollection;
use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneResource;
use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneCollection;
use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneGroupEnum;
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
            'type' => StoneFamilyEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneFamilyRelationshipsEnum::GROWN_STONES->value => $this->sectionRelationships(
                    StoneFamilyNameRoutesEnum::RELATED_TO_GROWN_STONES->value,
                    GrownStoneCollection::class
                ),
                StoneFamilyRelationshipsEnum::NATURAL_STONES->value => $this->sectionRelationships(
                    StoneFamilyNameRoutesEnum::RELATED_TO_NATURAL_STONES->value,
                    NaturalStoneCollection::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            GrownStoneCollection::class => $this->whenLoaded(StoneFamilyRelationshipsEnum::GROWN_STONES->value),
            NaturalStoneCollection::class => $this->whenLoaded(StoneFamilyRelationshipsEnum::NATURAL_STONES->value),
        ];
    }
}
