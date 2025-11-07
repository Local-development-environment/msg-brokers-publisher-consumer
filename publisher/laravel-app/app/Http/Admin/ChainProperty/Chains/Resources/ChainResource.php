<?php
declare(strict_types=1);

namespace App\Http\Admin\ChainProperty\Chains\Resources;

use App\Http\Admin\ChainProperty\ChainMetrics\Resources\ChainMetricCollection;
use App\Http\Admin\ChainProperty\ChainWeavings\Resources\ChainWeavingCollection;
use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeCollection;
use App\Http\Admin\SharedProperty\Weaving\Resources\WeavingCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\JewelleryProperties\Chains\Chains\Enums\ChainNameRoutesEnum;
use Domain\JewelleryProperties\Chains\Chains\Enums\ChainRelationshipsEnum;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Chain */
final class ChainResource extends JsonResource
{
   use IncludeRelatedEntitiesResourceTrait;

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
                'jewellery' => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    JewelleryResource::class
                ),
                'clasp' => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_CLASP->value,
                    ClaspResource::class
                ),
                'chainMetrics' => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_CHAIN_METRICS->value,
                    ChainMetricCollection::class
                ),
                'neckSizes' => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_NECK_SIZES->value,
                    NeckSizeCollection::class
                ),
                'chainWeavings' => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_CHAIN_WEAVINGS->value,
                    ChainWeavingCollection::class
                ),
                'weavings' => $this->sectionRelationships(
                    ChainNameRoutesEnum::RELATED_TO_WEAVINGS->value,
                    WeavingCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            JewelleryResource::class => $this->whenLoaded(ChainRelationshipsEnum::JEWELLERY->value),
            ClaspResource::class => $this->whenLoaded(ChainRelationshipsEnum::CLASP->value),
            ChainMetricCollection::class => $this->whenLoaded(ChainRelationshipsEnum::CHAIN_METRICS->value),
            ChainWeavingCollection::class => $this->whenLoaded(ChainRelationshipsEnum::CHAIN_WEAVINGS->value),
            NeckSizeCollection::class => $this->whenLoaded(ChainRelationshipsEnum::NECK_SIZES->value),
            WeavingCollection::class => $this->whenLoaded(ChainRelationshipsEnum::WEAVINGS->value),
        ];
    }
}
