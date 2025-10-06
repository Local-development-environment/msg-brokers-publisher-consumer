<?php

namespace App\Http\Admin\Insert\StoneFacets\Resources;

use App\Http\Admin\Insert\InsertStones\Resources\InsertStoneCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\StoneFacets\Enums\StoneFacetEnum;
use Domain\Inserts\StoneFacets\Enums\StoneFacetNameRoutesEnum;
use Domain\Inserts\StoneFacets\Enums\StoneFacetRelationshipsEnum;
use Domain\Inserts\StoneFacets\Models\StoneFacet;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin StoneFacet */
class StoneFacetResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => StoneFacetEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneFacetRelationshipsEnum::INSERT_STONES->value => $this->sectionRelationships(
                    StoneFacetNameRoutesEnum::RELATED_TO_INSERT_STONES->value,
                    InsertStoneCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            InsertStoneCollection::class => $this->whenLoaded(StoneFacetRelationshipsEnum::INSERT_STONES->value),
        ];
    }
}
