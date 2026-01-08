<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriors\Resources;

use App\Http\Admin\Insert\Colours\Resources\StoneColourResource;
use App\Http\Admin\Insert\Facets\Resources\StoneFacetResource;
use App\Http\Admin\Insert\Inserts\Resources\InsertResource;
use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorNameRoutesEnum;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorRelationshipsEnum;
use Domain\Inserts\StoneExteriors\Models\StoneExterior;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin StoneExterior */
final class StoneExteriorResource extends JsonResource
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
            'type' => StoneExteriorEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneExteriorRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    StoneExteriorNameRoutesEnum::RELATED_TO_STONE->value,
                    StoneExteriorRelationshipsEnum::STONE->value
                ),
                StoneExteriorRelationshipsEnum::INSERTS->value => $this->sectionRelationships(
                    StoneExteriorNameRoutesEnum::RELATED_TO_INSERTS->value,
                    StoneExteriorRelationshipsEnum::INSERTS->value
                ),
                StoneExteriorRelationshipsEnum::FACET->value => $this->sectionRelationships(
                    StoneExteriorNameRoutesEnum::RELATED_TO_STONE_FACET->value,
                    StoneExteriorNameRoutesEnum::RELATED_TO_STONE_FACET->value
                ),
                StoneExteriorRelationshipsEnum::STONE_COLOUR->value => $this->sectionRelationships(
                    StoneExteriorNameRoutesEnum::RELATED_TO_STONE_COLOUR->value,
                    StoneExteriorRelationshipsEnum::STONE_COLOUR->value
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new StoneResource($this->whenLoaded(StoneExteriorRelationshipsEnum::STONE->value)),
            InsertResource::collection($this->whenLoaded(StoneExteriorRelationshipsEnum::INSERTS->value)),
            new StoneFacetResource($this->whenLoaded(StoneExteriorRelationshipsEnum::FACET->value)),
            new StoneColourResource($this->whenLoaded(StoneExteriorRelationshipsEnum::STONE_COLOUR->value)),
        ];
    }
}
