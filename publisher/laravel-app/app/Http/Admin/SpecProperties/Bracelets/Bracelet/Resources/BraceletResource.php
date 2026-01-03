<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Resources\BraceletMetricResource;
use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Resources\BraceletSizeResource;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletRelationshipsEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;
use Illuminate\Support\Collection;

/** @mixin Bracelet */
final class BraceletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'type'          => BraceletEnum::TYPE_RESOURCE->value,
            'attributes'    => [
                'clasp_id'         => $this->clasp_id,
                'body_part_id'     => $this->body_part_id,
                'bracelet_base_id' => $this->bracelet_base_id,
                'created_at'       => $this->created_at,
                'updated_at'       => $this->updated_at,
            ],
            'relationships' => [
                'jewellery'       => [
                    'links' => [
                        'self'    => route(BraceletNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value, ['id' => $this->id]),
                        'related' => route(BraceletNameRoutesEnum::RELATED_TO_JEWELLERY->value, ['id' => $this->id]),
                    ],
                    'data'  => (new ApiEntityIdentifierResource($this->whenLoaded('jewellery')))
                ],
                'braceletMetrics' => [
                    'links' => [
                        'self'    => route(BraceletNameRoutesEnum::RELATIONSHIP_TO_BRACELET_METRICS->value, ['id' => $this->id]),
                        'related' => route(BraceletNameRoutesEnum::RELATED_TO_BRACELET_METRICS->value, ['id' => $this->id]),
                    ],
                    'data'  => ApiEntityIdentifierResource::collection(
                        $this->whenLoaded(BraceletRelationshipsEnum::BRACELET_METRICS->value))
                ],
                'braceletSizes'   => [
                    'links' => [
                        'self'    => route(BraceletNameRoutesEnum::RELATIONSHIP_TO_BRACELET_SIZES->value, ['id' => $this->id]),
                        'related' => route(BraceletNameRoutesEnum::RELATED_TO_BRACELET_SIZES->value, ['id' => $this->id]),
                    ],
                    'data'  => ApiEntityIdentifierResource::collection(
                        $this->whenLoaded(BraceletRelationshipsEnum::BRACELET_SIZES->value))
                ]
            ]
        ];
    }

    private function relations(): array
    {
        return [
            BraceletMetricResource::collection($this->whenLoaded('braceletMetrics')),
            BraceletSizeResource::collection($this->whenLoaded('braceletSizes')),
            JewelleryResource::collection([$this->whenLoaded('jewellery')])
        ];
    }

    public function included(Request $request): Collection
    {
        return collect($this->relations())
            ->filter(function ($relation) {
                return !$relation->resource instanceof MissingValue;
            })
            ->filter(function ($relation) {
                return $relation->collection !== null;
            })
            ->filter(function ($relation) {
                return !$relation->collection[0]->resource instanceof MissingValue;
            })
            ->flatMap(function ($relation) use ($request) {
                return $relation->toArray($request);
            });
    }

    public function with($request): array
    {
        $with = [];
        if ($this->included($request)->isNotEmpty()) {
            $with['included'] = $this->included($request);
        }

        return $with;
    }
}
