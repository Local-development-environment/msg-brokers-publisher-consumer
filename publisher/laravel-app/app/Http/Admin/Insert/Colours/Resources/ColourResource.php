<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Colours\Resources;

use App\Http\Admin\Insert\StoneExteriors\Resources\StoneExteriorCollection;
use App\Http\Admin\Insert\StoneExteriors\Resources\StoneExteriorResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Inserts\Colours\Enums\ColourNameRoutesEnum;
use Domain\Inserts\Colours\Enums\ColourRelationshipsEnum;
use Domain\Inserts\Colours\Models\Colour;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Colour */
final class ColourResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => ColourEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                ColourRelationshipsEnum::STONE_EXTERIORS->value => $this->sectionRelationships(
                    ColourNameRoutesEnum::RELATED_TO_STONE_EXTERIORS->value,
                    ColourRelationshipsEnum::STONE_EXTERIORS->value,
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneExteriorResource::collection($this->whenLoaded(ColourRelationshipsEnum::STONE_EXTERIORS->value)),
        ];
    }
}
