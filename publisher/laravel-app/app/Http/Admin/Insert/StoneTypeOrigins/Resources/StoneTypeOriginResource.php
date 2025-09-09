<?php

namespace App\Http\Admin\Insert\StoneTypeOrigins\Resources;

use App\Http\Admin\Insert\Stones\Resources\StoneCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginNameRoutesEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginRelationshipsEnum;
use Domain\Inserts\TypeOrigins\Models\TypeOrigin;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin TypeOrigin */
class StoneTypeOriginResource extends JsonResource
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
            'type' => TypeOriginEnum::RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                TypeOriginRelationshipsEnum::STONES->value => $this->sectionRelationships(
                    TypeOriginNameRoutesEnum::RELATED_TO_STONES->value,
                    StoneCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneCollection::class => $this->whenLoaded(TypeOriginRelationshipsEnum::STONES->value),
        ];
    }
}
