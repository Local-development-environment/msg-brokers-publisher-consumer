<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Stones\Resources;

use App\Http\Admin\Insert\Facets\Resources\StoneFacetResource;
use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneResource;
use App\Http\Admin\Insert\ImitationStones\Resources\ImitationStoneResource;
use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Admin\Insert\OpticalEffectStones\Resources\StoneOpticalEffectResource;
use App\Http\Admin\Insert\StoneColours\Resources\StoneColourResource;
use App\Http\Admin\Insert\StoneExteriors\Resources\StoneExteriorResource;
use App\Http\Admin\Insert\TypeOrigins\Resources\TypeOriginResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Inserts\Stones\Enums\StoneEnum;
use Domain\Inserts\Stones\Enums\StoneNameRoutesEnum;
use Domain\Inserts\Stones\Enums\StoneRelationshipsEnum;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Stone */
final class StoneResource extends JsonResource
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
            'type' => StoneEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneRelationshipsEnum::TYPE_ORIGIN->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_STONE_TYPE_ORIGIN->value,
                    StoneRelationshipsEnum::TYPE_ORIGIN->value
                ),
                StoneRelationshipsEnum::IMITATION_STONE->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_IMITATION_STONE->value,
                    StoneRelationshipsEnum::IMITATION_STONE->value
                ),
                StoneRelationshipsEnum::GROWN_STONE->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_GROWN_STONE->value,
                    StoneRelationshipsEnum::GROWN_STONE->value
                ),
                StoneRelationshipsEnum::NATURAL_STONE->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_NATURAL_STONE->value,
                    StoneRelationshipsEnum::NATURAL_STONE->value
                ),
                StoneRelationshipsEnum::FACETS->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_FACETS->value,
                    StoneRelationshipsEnum::FACETS->value
                ),
                StoneRelationshipsEnum::STONE_COLOURS->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_STONE_COLOURS->value,
                    StoneRelationshipsEnum::STONE_COLOURS->value
                ),
                StoneRelationshipsEnum::STONE_EXTERIORS->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_STONE_EXTERIORS->value,
                    StoneRelationshipsEnum::STONE_EXTERIORS->value
                ),
                StoneRelationshipsEnum::STONE_OPTICAL_EFFECT->value => $this->sectionRelationships(
                    StoneNameRoutesEnum::RELATED_TO_STONE_OPTICAL_EFFECT->value,
                    StoneRelationshipsEnum::STONE_OPTICAL_EFFECT->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new TypeOriginResource($this->whenLoaded(StoneRelationshipsEnum::TYPE_ORIGIN->value)),
            new ImitationStoneResource($this->whenLoaded(StoneRelationshipsEnum::IMITATION_STONE->value)),
            new GrownStoneResource($this->whenLoaded(StoneRelationshipsEnum::GROWN_STONE->value)),
            new NaturalStoneResource($this->whenLoaded(StoneRelationshipsEnum::NATURAL_STONE->value)),
            StoneFacetResource::collection($this->whenLoaded(StoneRelationshipsEnum::FACETS->value)),
            StoneColourResource::collection($this->whenLoaded(StoneRelationshipsEnum::STONE_COLOURS->value)),
            StoneExteriorResource::collection($this->whenLoaded(StoneRelationshipsEnum::STONE_EXTERIORS->value)),
            new StoneOpticalEffectResource($this->whenLoaded(StoneRelationshipsEnum::STONE_OPTICAL_EFFECT->value)),
        ];
    }
}
