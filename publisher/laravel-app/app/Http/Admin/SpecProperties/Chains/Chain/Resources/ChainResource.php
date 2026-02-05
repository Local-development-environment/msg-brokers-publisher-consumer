<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\Chain\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Admin\SharedProperty\Weaving\Resources\WeavingResource;
use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Resources\ChainMetricResource;
use App\Http\Admin\SpecProperties\Chains\ChainWeaving\Resources\ChainWeavingResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Enums\ChainNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Enums\ChainRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Models\Chain;

/** @mixin Chain */
final class ChainResource extends JsonResource
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
            'type' => Chain::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                ChainRelationshipsEnum::JEWELLERY->value => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    ChainRelationshipsEnum::JEWELLERY->value
                ),
                ChainRelationshipsEnum::CLASP->value => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_CLASP->value,
                    ChainRelationshipsEnum::CLASP->value
                ),
                ChainRelationshipsEnum::CHAIN_METRICS->value => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_CHAIN_METRICS->value,
                    ChainRelationshipsEnum::CHAIN_METRICS->value
                ),
                ChainRelationshipsEnum::NECK_SIZES->value => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_NECK_SIZES->value,
                    ChainRelationshipsEnum::NECK_SIZES->value
                ),
                ChainRelationshipsEnum::CHAIN_WEAVINGS->value => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_CHAIN_WEAVINGS->value,
                    ChainRelationshipsEnum::CHAIN_WEAVINGS->value
                ),
                ChainRelationshipsEnum::WEAVINGS->value => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_WEAVINGS->value,
                    ChainRelationshipsEnum::WEAVINGS->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new JewelleryResource($this->whenLoaded(ChainRelationshipsEnum::JEWELLERY->value)),
            new ClaspResource($this->whenLoaded(ChainRelationshipsEnum::CLASP->value)),
            ChainMetricResource::collection($this->whenLoaded(ChainRelationshipsEnum::CHAIN_METRICS->value)),
            ChainWeavingResource::collection($this->whenLoaded(ChainRelationshipsEnum::CHAIN_WEAVINGS->value)),
            NeckSizeResource::collection($this->whenLoaded(ChainRelationshipsEnum::NECK_SIZES->value)),
            WeavingResource::collection($this->whenLoaded(ChainRelationshipsEnum::WEAVINGS->value)),
        ];
    }
}
