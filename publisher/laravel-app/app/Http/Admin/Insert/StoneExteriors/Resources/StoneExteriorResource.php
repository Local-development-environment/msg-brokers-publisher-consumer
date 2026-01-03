<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriors\Resources;

use App\Http\Admin\Insert\Colours\Resources\ColourResource;
use App\Http\Admin\Insert\Facets\Resources\StoneFacetResource;
use App\Http\Admin\Insert\Inserts\Resources\InsertCollection;
use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorEnum;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorNameRoutesEnum;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorRelationshipsEnum;
use Domain\Inserts\StoneExteriors\Models\StoneExterior;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin StoneExterior */
final class StoneExteriorResource extends JsonResource
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
            'type' => StoneExteriorEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneExteriorRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    StoneExteriorNameRoutesEnum::RELATED_TO_STONE->value,
                    StoneResource::class
                ),
                StoneExteriorRelationshipsEnum::INSERTS->value => $this->sectionRelationships(
                    StoneExteriorNameRoutesEnum::RELATED_TO_INSERTS->value,
                    InsertCollection::class
                ),
                StoneExteriorRelationshipsEnum::FACET->value => $this->sectionRelationships(
                    StoneExteriorNameRoutesEnum::RELATED_TO_STONE_FACET->value,
                    StoneFacetResource::class
                ),
                StoneExteriorRelationshipsEnum::COLOUR->value => $this->sectionRelationships(
                    StoneExteriorNameRoutesEnum::RELATED_TO_STONE_COLOUR->value,
                    ColourResource::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneResource::class => $this->whenLoaded(StoneExteriorRelationshipsEnum::STONE->value),
            InsertCollection::class => $this->whenLoaded(StoneExteriorRelationshipsEnum::INSERTS->value),
            StoneFacetResource::class => $this->whenLoaded(StoneExteriorRelationshipsEnum::FACET->value),
            ColourResource::class => $this->whenLoaded(StoneExteriorRelationshipsEnum::COLOUR->value),
        ];
    }
}
