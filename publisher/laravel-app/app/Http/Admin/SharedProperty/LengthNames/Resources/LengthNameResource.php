<?php

namespace App\Http\Admin\SharedProperty\LengthNames\Resources;

use App\Http\Admin\BeadProperty\Beads\Resources\BeadCollection;
use App\Http\Admin\BeadProperty\BeadSizes\Resources\BeadSizeCollection;
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
                'beadSizes' => $this->sectionRelationships(
                    LengthNameNameRoutesEnum::RELATED_TO_BEAD_SIZES->value,
                    BeadSizeCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            BeadSizeCollection::class => $this->whenLoaded(LengthNameRelationshipsEnum::BEAD_SIZES->value),
        ];
    }
}
