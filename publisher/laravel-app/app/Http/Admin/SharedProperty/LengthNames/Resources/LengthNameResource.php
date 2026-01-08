<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\LengthNames\Resources;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameNameRoutesEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameRelationshipsEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Models\LengthName;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin LengthName */
final class LengthNameResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

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
                LengthNameRelationshipsEnum::NECK_SIZES->value => $this->sectionRelationships(
                    LengthNameNameRoutesEnum::RELATED_TO_NECK_SIZES->value,
                    LengthNameRelationshipsEnum::NECK_SIZES->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            NeckSizeResource::collection($this->whenLoaded(LengthNameRelationshipsEnum::NECK_SIZES->value)),
        ];
    }
}
