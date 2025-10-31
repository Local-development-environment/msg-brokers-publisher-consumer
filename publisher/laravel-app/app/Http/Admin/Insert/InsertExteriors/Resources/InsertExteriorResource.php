<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertExteriors\Resources;

use App\Http\Admin\Insert\Colours\Resources\ColourResource;
use App\Http\Admin\Insert\Facets\Resources\StoneFacetResource;
use App\Http\Admin\Insert\Inserts\Resources\InsertCollection;
use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\InsertExteriors\Enums\InsertExteriorEnum;
use Domain\Inserts\InsertExteriors\Enums\InsertExteriorNameRoutesEnum;
use Domain\Inserts\InsertExteriors\Enums\InsertExteriorRelationshipsEnum;
use Domain\Inserts\InsertExteriors\Models\InsertExterior;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin InsertExterior */
final class InsertExteriorResource extends JsonResource
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
            'type' => InsertExteriorEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                InsertExteriorRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    InsertExteriorNameRoutesEnum::RELATED_TO_STONE->value,
                    StoneResource::class
                ),
                InsertExteriorRelationshipsEnum::INSERTS->value => $this->sectionRelationships(
                    InsertExteriorNameRoutesEnum::RELATED_TO_INSERTS->value,
                    InsertCollection::class
                ),
                InsertExteriorRelationshipsEnum::FACET->value => $this->sectionRelationships(
                    InsertExteriorNameRoutesEnum::RELATED_TO_STONE_FACET->value,
                    StoneFacetResource::class
                ),
                InsertExteriorRelationshipsEnum::COLOUR->value => $this->sectionRelationships(
                    InsertExteriorNameRoutesEnum::RELATED_TO_STONE_COLOUR->value,
                    ColourResource::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneResource::class => $this->whenLoaded(InsertExteriorRelationshipsEnum::STONE->value),
            InsertCollection::class => $this->whenLoaded(InsertExteriorRelationshipsEnum::INSERTS->value),
            StoneFacetResource::class => $this->whenLoaded(InsertExteriorRelationshipsEnum::FACET->value),
            ColourResource::class => $this->whenLoaded(InsertExteriorRelationshipsEnum::COLOUR->value),
        ];
    }
}
