<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingFingers\Resources;

use App\Http\Admin\SpecProperties\Rings\Ring\Resources\RingResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerRelationshipsEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Models\RingFinger;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin RingFinger */
final class RingFingerResource extends JsonResource
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
            'type' => RingFinger::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                RingFingerRelationshipsEnum::RINGS->value => $this->sectionRelationships(
                    RingFingerNameRoutesEnum::RELATED_TO_RINGS->value,
                    RingFingerRelationshipsEnum::RINGS->value,
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            RingResource::collection($this->whenLoaded(RingFingerRelationshipsEnum::RINGS->value)),
        ];
    }
}
