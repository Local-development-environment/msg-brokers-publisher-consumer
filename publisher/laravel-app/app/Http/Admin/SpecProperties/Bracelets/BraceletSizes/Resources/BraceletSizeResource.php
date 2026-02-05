<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Enums\BraceletSizeNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Models\BraceletSize;

/** @mixin BraceletSize */
final class BraceletSizeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => BraceletSizeEnum::TYPE_RESOURCE->value,
            'attribute' => [
                'value' => $this->value,
                'unit' => $this->unit,
                'annotation' => $this->annotation,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'braceletMetrics' => [
                    'links' => [
                        'self' => route(BraceletSizeNameRoutesEnum::RELATIONSHIP_TO_BRACELET_METRICS->value , ['id' => $this->id]),
                        'related' => route(BraceletSizeNameRoutesEnum::RELATED_TO_BRACELET_METRICS->value , ['id' => $this->id]),
                    ],
//                    'data' => (new ApiEntityIdentifierResource($this->whenLoaded('braceletMetrics'))),
                ],
                'bracelets' => [
                    'links' => [
                        'self' => route(BraceletSizeNameRoutesEnum::RELATIONSHIP_TO_BRACELETS->value , ['id' => $this->id]),
                        'related' => route(BraceletSizeNameRoutesEnum::RELATED_TO_BRACELETS->value , ['id' => $this->id]),
                    ],
//                    'data' => (new ApiEntityIdentifierResource($this->whenLoaded('bracelets'))),
                ]
            ]
        ];
    }
}
