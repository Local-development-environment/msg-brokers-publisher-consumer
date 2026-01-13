<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\TieClips\TieClip\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\TieClips\TieClips\Enums\TieClipNameRoutesEnum;
use Domain\JewelleryProperties\TieClips\TieClips\Enums\TieClipRelationshipsEnum;
use Domain\JewelleryProperties\TieClips\TieClips\Models\TieClip;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin TieClip */
final class TieClipResource extends JsonResource
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
            'type' => TieClip::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                TieClipRelationshipsEnum::JEWELLERY->value => $this->sectionRelationships(
                    TieClipNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    TieClipRelationshipsEnum::JEWELLERY->value,
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new JewelleryResource($this->whenLoaded(TieClipRelationshipsEnum::JEWELLERY->value)),
        ];
    }
}
