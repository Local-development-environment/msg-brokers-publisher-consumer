<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Enums\CharmPendantNameRoutesEnum;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Enums\CharmPendantRelationshipsEnum;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Models\CharmPendant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin CharmPendant */
final class CharmPendantResource extends JsonResource
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
            'type' => CharmPendant::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                CharmPendantRelationshipsEnum::JEWELLERY->value => $this->sectionRelationships(
                    CharmPendantNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    CharmPendantRelationshipsEnum::JEWELLERY->value,
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new JewelleryResource($this->whenLoaded(CharmPendantRelationshipsEnum::JEWELLERY->value)),
        ];
    }
}
