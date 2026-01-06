<?php
declare(strict_types=1);

namespace App\Http\Admin\Jewellery\Categories\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryNameRoutesEnum;
use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryRelationshipsEnum;
use Domain\Jewelleries\JewelleryCategories\Models\JewelleryCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin JewelleryCategory */
final class JewelleryCategoryResource extends JsonResource
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
            'type' => JewelleryCategory::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'jewelleries' => $this->sectionRelationships(
                    JewelleryCategoryNameRoutesEnum::RELATED_TO_JEWELLERIES->value,
                    JewelleryCategoryRelationshipsEnum::JEWELLERIES->value,
                ),
            ]
        ];
    }

    function relations(): array
    {
        return [
            JewelleryResource::collection($this->whenLoaded(JewelleryCategoryRelationshipsEnum::JEWELLERIES->value)),
        ];
    }
}
