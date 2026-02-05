<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Resources;

use App\Http\Admin\SharedProperty\LengthNames\Resources\LengthNameResource;
use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadResource;
use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Resources\BeadMetricResource;
use App\Http\Admin\SpecProperties\Chains\Chain\Resources\ChainResource;
use App\Http\Admin\SpecProperties\Necklaces\Necklace\Resources\NecklaceResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums\NeckSizeNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums\NeckSizeRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Models\NeckSize;

/** @mixin NeckSize */
final class NeckSizeResource extends JsonResource
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
            'type' => NeckSize::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                NeckSizeRelationshipsEnum::BEADS->value => $this->sectionRelationships(
                    NeckSizeNameRoutesEnum::RELATED_TO_BEADS->value,
                    NeckSizeRelationshipsEnum::BEADS->value
                ),
                NeckSizeRelationshipsEnum::CHAINS->value => $this->sectionRelationships(
                    NeckSizeNameRoutesEnum::RELATED_TO_CHAINS->value,
                    NeckSizeRelationshipsEnum::CHAINS->value
                ),
                NeckSizeRelationshipsEnum::NECKLACES->value => $this->sectionRelationships(
                    NeckSizeNameRoutesEnum::RELATED_TO_NECKLACES->value,
                    NeckSizeRelationshipsEnum::NECKLACES->value
                ),
                NeckSizeRelationshipsEnum::LENGTH_NAME->value => $this->sectionRelationships(
                    NeckSizeNameRoutesEnum::RELATED_TO_LENGTH_NAME->value,
                    NeckSizeRelationshipsEnum::LENGTH_NAME->value
                ),
                NeckSizeRelationshipsEnum::BEAD_METRICS->value => $this->sectionRelationships(
                    NeckSizeNameRoutesEnum::RELATED_TO_BEAD_METRICS->value,
                    NeckSizeRelationshipsEnum::BEAD_METRICS->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            BeadResource::collection($this->whenLoaded(NeckSizeRelationshipsEnum::BEADS->value)),
            ChainResource::collection($this->whenLoaded(NeckSizeRelationshipsEnum::CHAINS->value)),
            NecklaceResource::collection($this->whenLoaded(NeckSizeRelationshipsEnum::NECKLACES->value)),
            new LengthNameResource($this->whenLoaded(NeckSizeRelationshipsEnum::LENGTH_NAME->value)),
            BeadMetricResource::collection($this->whenLoaded(NeckSizeRelationshipsEnum::BEAD_METRICS->value)),
        ];
    }
}
