<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Pendants\Pendants\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Enums\PendantNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Enums\PendantRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Models\Pendant;

/** @mixin Pendant */
final class PendantResource extends JsonResource
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
            'type' => Pendant::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                PendantRelationshipsEnum::JEWELLERY->value => $this->sectionRelationships(
                    PendantNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    PendantRelationshipsEnum::JEWELLERY->value,
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new JewelleryResource($this->whenLoaded(PendantRelationshipsEnum::JEWELLERY->value)),
        ];
    }
}
