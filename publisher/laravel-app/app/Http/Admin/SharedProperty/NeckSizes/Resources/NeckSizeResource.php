<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Resources;

use App\Http\Admin\BeadProperty\BeadMetrics\Resources\BeadMetricCollection;
use App\Http\Admin\ChainProperty\Chains\Resources\ChainCollection;
use App\Http\Admin\NecklaceProperty\Necklaces\Resources\NecklaceCollection;
use App\Http\Admin\SharedProperty\LengthNames\Resources\LengthNameResource;
use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeNameRoutesEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeRelationshipsEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin NeckSize */
final class NeckSizeResource extends JsonResource
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
            'type' => NeckSize::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'beads' => $this->sectionRelationships(
                    NeckSizeNameRoutesEnum::RELATED_TO_BEADS->value,
                    BeadCollection::class
                ),
                'chains' => $this->sectionRelationships(
                    NeckSizeNameRoutesEnum::RELATED_TO_CHAINS->value,
                    ChainCollection::class
                ),
                'necklaces' => $this->sectionRelationships(
                    NeckSizeNameRoutesEnum::RELATED_TO_NECKLACES->value,
                    NecklaceCollection::class
                ),
                'lengthName' => $this->sectionRelationships(
                    NeckSizeNameRoutesEnum::RELATED_TO_LENGTH_NAME->value,
                    LengthNameResource::class
                ),
                'beadMetrics' => $this->sectionRelationships(
                    NeckSizeNameRoutesEnum::RELATED_TO_BEAD_METRICS->value,
                    BeadMetricCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            BeadCollection::class => $this->whenLoaded(NeckSizeRelationshipsEnum::BEADS->value),
            ChainCollection::class => $this->whenLoaded(NeckSizeRelationshipsEnum::CHAINS->value),
            NecklaceCollection::class => $this->whenLoaded(NeckSizeRelationshipsEnum::NECKLACES->value),
            LengthNameResource::class => $this->whenLoaded(NeckSizeRelationshipsEnum::LENGTH_NAME->value),
            BeadMetricCollection::class => $this->whenLoaded(NeckSizeRelationshipsEnum::BEAD_METRICS->value),
        ];
    }
}
