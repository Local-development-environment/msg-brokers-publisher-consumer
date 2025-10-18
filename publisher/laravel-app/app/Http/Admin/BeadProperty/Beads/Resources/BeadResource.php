<?php

namespace App\Http\Admin\BeadProperty\Beads\Resources;

use App\Http\Admin\BeadProperty\BeadBases\Resources\BeadBaseResource;
use App\Http\Admin\BeadProperty\BeadMetrics\Resources\BeadMetricCollection;
use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadNameRoutesEnum;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadRelationshipsEnum;
use Domain\JewelleryProperties\Beads\Beads\Models\Bead;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Bead */
class BeadResource extends JsonResource
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
            'type' => Bead::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'jewellery' => $this->sectionRelationships(
                    BeadNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    JewelleryResource::class
                ),
                'clasp' => $this->sectionRelationships(
                    BeadNameRoutesEnum::RELATED_TO_CLASP->value,
                    ClaspResource::class
                ),
                'beadMetrics' => $this->sectionRelationships(
                    BeadNameRoutesEnum::RELATED_TO_BEAD_METRICS->value,
                    BeadMetricCollection::class
                ),
                'beadBase' => $this->sectionRelationships(
                    BeadNameRoutesEnum::RELATED_TO_BEAD_BASE->value,
                    BeadBaseResource::class
                ),
                'neckSizes' => $this->sectionRelationships(
                    BeadNameRoutesEnum::RELATED_TO_NECK_SIZES->value,
                    NeckSizeCollection::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            JewelleryResource::class => $this->whenLoaded(BeadRelationshipsEnum::JEWELLERY->value),
            ClaspResource::class => $this->whenLoaded(BeadRelationshipsEnum::CLASP->value),
            BeadMetricCollection::class => $this->whenLoaded(BeadRelationshipsEnum::BEAD_METRICS->value),
            BeadBaseResource::class => $this->whenLoaded(BeadRelationshipsEnum::BEAD_BASE->value),
            NeckSizeCollection::class => $this->whenLoaded(BeadRelationshipsEnum::NECK_SIZES->value),
        ];
    }
}
