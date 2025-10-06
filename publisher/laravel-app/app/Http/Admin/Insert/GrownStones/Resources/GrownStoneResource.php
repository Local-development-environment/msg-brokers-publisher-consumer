<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\GrownStones\Resources;

use App\Http\Admin\Insert\StoneFamilies\Resources\StoneFamilyResource;
use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\GrownStones\Enums\GrownStoneEnum;
use Domain\Inserts\GrownStones\Enums\GrownStoneNameRoutesEnum;
use Domain\Inserts\GrownStones\Enums\GrownStoneRelationshipsEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GrownStoneResource extends JsonResource
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
            'type' => GrownStoneEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                GrownStoneRelationshipsEnum::STONE_FAMILY->value => $this->sectionRelationships(
                    GrownStoneNameRoutesEnum::RELATED_TO_STONE_FAMILY->value,
                    StoneFamilyResource::class
                ),
                GrownStoneRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    GrownStoneNameRoutesEnum::RELATED_TO_STONE->value,
                    StoneResource::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneFamilyResource::class => $this->whenLoaded(GrownStoneRelationshipsEnum::STONE_FAMILY->value),
            StoneResource::class => $this->whenLoaded(GrownStoneRelationshipsEnum::STONE->value),
        ];
    }
}
