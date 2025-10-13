<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadSizes\Resources;

use App\Http\Admin\BeadProperty\BeadMetrics\Resources\BeadMetricCollection;
use App\Http\Admin\BeadProperty\Beads\Resources\BeadCollection;
use App\Http\Admin\SharedProperty\LengthNames\Resources\LengthNameResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\JewelleryProperties\Beads\BeadSizes\Enums\BeadSizeNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadSizes\Enums\BeadSizeRelationshipsEnum;
use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BeadSize */
final class BeadSizeResource extends JsonResource
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
            'type' => BeadSize::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'beads' => $this->sectionRelationships(
                    BeadSizeNameRoutesEnum::RELATED_TO_BEADS->value,
                    BeadCollection::class
                ),
                'lengthName' => $this->sectionRelationships(
                    BeadSizeNameRoutesEnum::RELATED_TO_LENGTH_NAME->value,
                    LengthNameResource::class
                ),
                'beadMetrics' => $this->sectionRelationships(
                    BeadSizeNameRoutesEnum::RELATED_TO_BEAD_METRICS->value,
                    BeadMetricCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            BeadCollection::class => $this->whenLoaded(BeadSizeRelationshipsEnum::BEADS->value),
            LengthNameResource::class => $this->whenLoaded(BeadSizeRelationshipsEnum::LENGTH_NAME->value),
            BeadMetricCollection::class => $this->whenLoaded(BeadSizeRelationshipsEnum::BEAD_METRICS->value),
        ];
    }
}
