<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Colours\Resources;

use App\Http\Admin\Insert\InsertExteriors\Resources\InsertExteriorCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\Colours\Enums\ColourEnum;
use Domain\Inserts\Colours\Enums\ColourNameRoutesEnum;
use Domain\Inserts\Colours\Enums\ColourRelationshipsEnum;
use Domain\Inserts\Colours\Models\Colour;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Colour */
final class ColourResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => ColourEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                ColourRelationshipsEnum::INSERT_EXTERIORS->value => $this->sectionRelationships(
                    ColourNameRoutesEnum::RELATED_TO_INSERT_EXTERIORS->value,
                    InsertExteriorCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            InsertExteriorCollection::class => $this->whenLoaded(ColourRelationshipsEnum::INSERT_EXTERIORS->value),
        ];
    }
}
