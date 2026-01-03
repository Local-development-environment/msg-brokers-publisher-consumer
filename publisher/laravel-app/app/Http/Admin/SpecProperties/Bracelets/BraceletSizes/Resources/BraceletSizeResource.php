<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Resources;

use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Models\BraceletSize;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
