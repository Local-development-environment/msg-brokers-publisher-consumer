<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\Bead\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Admin\SpecProperties\Beads\BeadBase\Resources\BeadBaseResource;
use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Resources\BeadMetricResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Enums\BeadNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Enums\BeadRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Models\Bead;

/** @mixin Bead */
final class BeadResource extends JsonResource
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
            'type' => Bead::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                BeadRelationshipsEnum::JEWELLERY->value => $this->sectionRelationships(
                    BeadNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    BeadRelationshipsEnum::JEWELLERY->value
                ),
                BeadRelationshipsEnum::CLASP->value => $this->sectionRelationships(
                    BeadNameRoutesEnum::RELATED_TO_CLASP->value,
                    BeadRelationshipsEnum::CLASP->value
                ),
                BeadRelationshipsEnum::BEAD_METRICS->value => $this->sectionRelationships(
                    BeadNameRoutesEnum::RELATED_TO_BEAD_METRICS->value,
                    BeadRelationshipsEnum::BEAD_METRICS->value
                ),
                BeadRelationshipsEnum::BEAD_BASE->value => $this->sectionRelationships(
                    BeadNameRoutesEnum::RELATED_TO_BEAD_BASE->value,
                    BeadRelationshipsEnum::BEAD_BASE->value
                ),
                BeadRelationshipsEnum::NECK_SIZES->value => $this->sectionRelationships(
                    BeadNameRoutesEnum::RELATED_TO_NECK_SIZES->value,
                    BeadRelationshipsEnum::NECK_SIZES->value
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new JewelleryResource($this->whenLoaded(BeadRelationshipsEnum::JEWELLERY->value)),
            new ClaspResource($this->whenLoaded(BeadRelationshipsEnum::CLASP->value)),
            BeadMetricResource::collection($this->whenLoaded(BeadRelationshipsEnum::BEAD_METRICS->value)),
            new BeadBaseResource($this->whenLoaded(BeadRelationshipsEnum::BEAD_BASE->value)),
            NeckSizeResource::collection($this->whenLoaded(BeadRelationshipsEnum::NECK_SIZES->value)),
        ];
    }
}
