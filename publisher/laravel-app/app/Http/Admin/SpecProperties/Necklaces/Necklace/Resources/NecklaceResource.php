<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Necklaces\Necklace\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Resources\NecklaceMetricResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceNameRoutesEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceRelationshipsEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Necklace */
final class NecklaceResource extends JsonResource
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
            'type' => Necklace::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'jewellery' => $this->sectionRelationships(
                    NecklaceNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    NecklaceRelationshipsEnum::JEWELLERY->value,
                ),
                'clasp' => $this->sectionRelationships(
                    NecklaceNameRoutesEnum::RELATED_TO_CLASP->value,
                    NecklaceRelationshipsEnum::CLASP->value,
                ),
                'necklaceMetrics' => $this->sectionRelationships(
                    NecklaceNameRoutesEnum::RELATED_TO_NECKLACE_METRICS->value,
                    NecklaceRelationshipsEnum::NECKLACE_METRICS->value,
                ),
                'neckSizes' => $this->sectionRelationships(
                    NecklaceNameRoutesEnum::RELATED_TO_NECK_SIZES->value,
                    NecklaceRelationshipsEnum::NECK_SIZES->value,
                ),
            ]
        ];
    }

    protected function relations(): array
    {
        return array(
            JewelleryResource::collection([$this->whenLoaded(NecklaceRelationshipsEnum::JEWELLERY->value)]),
            ClaspResource::collection([$this->whenLoaded(NecklaceRelationshipsEnum::CLASP->value)]),
            NecklaceMetricResource::collection($this->whenLoaded(NecklaceRelationshipsEnum::NECKLACE_METRICS->value)),
            NeckSizeResource::collection($this->whenLoaded(NecklaceRelationshipsEnum::NECK_SIZES->value)),
        );
    }
}
