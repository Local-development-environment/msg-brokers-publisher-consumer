<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingTypes\Resources;

use App\Http\Admin\SpecProperties\Rings\Ring\Resources\RingResource;
use App\Http\Admin\SpecProperties\Rings\RingDetails\Resources\RingDetailResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeRelationshipsEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Models\RingType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin  RingType */
final class RingTypeResource extends JsonResource
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
            'type' => RingType::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                RingTypeRelationshipsEnum::RINGS->value => $this->sectionRelationships(
                    RingTypeNameRoutesEnum::RELATED_TO_RINGS->value,
                    RingTypeRelationshipsEnum::RINGS->value,
                ),
                RingTypeRelationshipsEnum::RING_DETAILS->value => $this->sectionRelationships(
                    RingTypeNameRoutesEnum::RELATED_TO_RING_DETAILS->value,
                    RingTypeRelationshipsEnum::RING_DETAILS->value,
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            RingResource::collection($this->whenLoaded(RingTypeRelationshipsEnum::RINGS->value)),
            RingDetailResource::collection($this->whenLoaded(RingTypeRelationshipsEnum::RING_DETAILS->value)),
        ];
    }
}
