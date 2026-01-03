<?php
declare(strict_types=1);

namespace App\Http\Admin\NecklaceProperty\Necklaces\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\NecklaceProperty\NecklaceMetrics\Resources\NecklaceMetricCollection;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
//use App\Http\Shared\Resources\Traits\ImprovedTraits\IncludeRelatedEntitiesResourceTrait;
use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceNameRoutesEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceRelationshipsEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Necklace */
final class NecklaceResource extends JsonResource
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
            'type' => Necklace::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'jewellery' => $this->sectionRelationships(
                    NecklaceNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    JewelleryResource::class
                ),
                'clasp' => $this->sectionRelationships(
                    NecklaceNameRoutesEnum::RELATED_TO_CLASP->value,
                    ClaspResource::class
                ),
                'necklaceMetrics' => $this->sectionRelationships(
                    NecklaceNameRoutesEnum::RELATED_TO_NECKLACE_METRICS->value,
                    NecklaceMetricCollection::class
                ),
                'neckSizes' => $this->sectionRelationships(
                    NecklaceNameRoutesEnum::RELATED_TO_NECK_SIZES->value,
                    NeckSizeCollection::class
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return array(
            JewelleryResource::class => $this->whenLoaded(NecklaceRelationshipsEnum::JEWELLERY->value),
            ClaspResource::class => $this->whenLoaded(NecklaceRelationshipsEnum::CLASP->value),
            NecklaceMetricCollection::class => $this->whenLoaded(NecklaceRelationshipsEnum::NECKLACE_METRICS->value),
            NeckSizeCollection::class => $this->whenLoaded(NecklaceRelationshipsEnum::NECK_SIZES->value),
        );
    }
}
