<?php
declare(strict_types=1);

namespace App\Http\Site\Jewelleries\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryViews\Enums\VJewelleryEnum;
use JewelleryDomain\Jewelleries\JewelleryViews\Models\VJewellery;

/**
 * @mixin VJewellery
 * @property mixed $id
 */
final class VJewelleryResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => VJewelleryEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
        ];
    }

    protected function relations(): array
    {
        return [

        ];
    }
}
