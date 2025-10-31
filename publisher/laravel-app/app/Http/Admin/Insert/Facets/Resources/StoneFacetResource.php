<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Facets\Resources;

use App\Http\Admin\Insert\InsertExteriors\Resources\InsertExteriorCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\Facets\Enums\FacetEnum;
use Domain\Inserts\Facets\Enums\FacetNameRoutesEnum;
use Domain\Inserts\Facets\Enums\FacetRelationshipsEnum;
use Domain\Inserts\Facets\Models\Facet;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Facet */
final class StoneFacetResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => FacetEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                FacetRelationshipsEnum::INSERT_EXTERIORS->value => $this->sectionRelationships(
                    FacetNameRoutesEnum::RELATED_TO_INSERT_EXTERIORS->value,
                    InsertExteriorCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            InsertExteriorCollection::class => $this->whenLoaded(FacetRelationshipsEnum::INSERT_EXTERIORS->value),
        ];
    }
}
