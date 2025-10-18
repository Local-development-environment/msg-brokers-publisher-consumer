<?php

namespace App\Http\Admin\SharedProperty\LengthNames\Resources;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameNameRoutesEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameRelationshipsEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin LengthName */
class LengthNameResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => LengthName::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'neckSizes' => $this->sectionRelationships(
                    LengthNameNameRoutesEnum::RELATED_TO_BEAD_SIZES->value,
                    NeckSizeCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            NeckSizeCollection::class => $this->whenLoaded(LengthNameRelationshipsEnum::NECK_SIZES->value),
        ];
    }
}
