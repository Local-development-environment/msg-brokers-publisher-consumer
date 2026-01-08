<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Colours\Resources;

use App\Http\Admin\Insert\StoneExteriors\Resources\StoneExteriorResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Inserts\StoneColours\Enums\StoneColourEnum;
use Domain\Inserts\StoneColours\Enums\StoneColourNameRoutesEnum;
use Domain\Inserts\StoneColours\Enums\StoneColourRelationshipsEnum;
use Domain\Inserts\StoneColours\Models\StoneColour;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin StoneColour */
final class StoneColourResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => StoneColourEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneColourRelationshipsEnum::STONE_EXTERIORS->value => $this->sectionRelationships(
                    StoneColourNameRoutesEnum::RELATED_TO_STONE_EXTERIORS->value,
                    StoneColourRelationshipsEnum::STONE_EXTERIORS->value,
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneExteriorResource::collection($this->whenLoaded(StoneColourRelationshipsEnum::STONE_EXTERIORS->value)),
        ];
    }
}
