<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Enums\BraceletMetricNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Models\BraceletMetric;

/** @mixin BraceletMetric */
final class BraceletMetricResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'type' => BraceletMetricEnum::TYPE_RESOURCE->value,
            'attribute' => [
                'bracelet_size_id' => $this->bracelet_size_id,
                'bracelet_id' => $this->bracelet_id,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'braceletSize' => [
                    'links' => [
                        'self' => route(BraceletMetricNameRoutesEnum::RELATIONSHIP_TO_BRACELET_SIZE->value , ['id' => $this->id]),
                        'related' => route(BraceletMetricNameRoutesEnum::RELATED_TO_BRACELET_SIZE->value , ['id' => $this->id]),
                    ],
//                    'data' => (new ApiEntityIdentifierResource($this->whenLoaded('braceletSize'))),
                ],
                'bracelet' => [
                    'links' => [
                        'self' => route(BraceletMetricNameRoutesEnum::RELATIONSHIP_TO_BRACELET->value , ['id' => $this->id]),
                        'related' => route(BraceletMetricNameRoutesEnum::RELATED_TO_BRACELET->value , ['id' => $this->id]),
                    ],
//                    'data' => (new ApiEntityIdentifierResource($this->whenLoaded('bracelet'))),
                ]
            ]
        ];
    }

//    private function relations(): array
//    {
//        return [
//            'braceletSize' => []
//        ];
//    }
}
