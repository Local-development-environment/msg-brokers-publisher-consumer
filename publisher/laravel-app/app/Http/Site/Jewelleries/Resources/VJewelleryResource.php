<?php

namespace App\Http\Site\Jewelleries\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;
use Domain\Jewelleries\JewelleryViews\Models\VJewellery;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin VJewellery
 * @property mixed $id
 */
class VJewelleryResource extends JsonResource
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
            'type' => VJewelleryEnum::TYPE_TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
        ];
    }

    protected function relations(): array
    {
        return [

        ];
    }
}
