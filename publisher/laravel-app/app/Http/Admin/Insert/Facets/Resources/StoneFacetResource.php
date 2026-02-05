<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Facets\Resources;

use App\Http\Admin\Insert\StoneExteriors\Resources\StoneExteriorResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Inserts\Facets\Enums\FacetEnum;
use JewelleryDomain\Jewelleries\Inserts\Facets\Enums\FacetNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\Facets\Enums\FacetRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\Facets\Models\Facet;

/** @mixin Facet */
final class StoneFacetResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => FacetEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                FacetRelationshipsEnum::STONE_EXTERIORS->value => $this->sectionRelationships(
                    FacetNameRoutesEnum::RELATED_TO_STONE_EXTERIORS->value,
                    FacetRelationshipsEnum::STONE_EXTERIORS->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneExteriorResource::collection($this->whenLoaded(FacetRelationshipsEnum::STONE_EXTERIORS->value)),
        ];
    }
}
