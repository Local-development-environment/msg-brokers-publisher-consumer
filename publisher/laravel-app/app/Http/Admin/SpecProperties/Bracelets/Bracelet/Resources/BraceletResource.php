<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Resources\BraceletMetricResource;
use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Resources\BraceletSizeCollection;
use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Resources\BraceletSizeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletRelationshipsEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Bracelet */
final class BraceletResource extends JsonResource
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
            'id'            => $this->id,
            'type'          => BraceletEnum::TYPE_RESOURCE->value,
            'attributes'    => $this->attributeItems(),
            'relationships' => [
                'jewellery'       => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    BraceletRelationshipsEnum::JEWELLERY->value,
                ),
                'braceletMetrics' => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_BRACELET_METRICS->value,
                    BraceletRelationshipsEnum::BRACELET_METRICS->value,
                ),
                'braceletSizes'   => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_BRACELET_SIZES->value,
                    BraceletRelationshipsEnum::BRACELET_SIZES->value,
                ),
                'clasp'           => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_CLASP->value,
                    BraceletRelationshipsEnum::CLASP->value,
                )
            ]
        ];
    }

    private function relations(): array
    {
        return [
            BraceletMetricResource::collection($this->whenLoaded(BraceletRelationshipsEnum::BRACELET_METRICS->value)),
            BraceletSizeResource::collection($this->whenLoaded(BraceletRelationshipsEnum::BRACELET_SIZES->value)),
            new JewelleryResource($this->whenLoaded(BraceletRelationshipsEnum::JEWELLERY->value)),
            new ClaspResource($this->whenLoaded(BraceletRelationshipsEnum::CLASP->value)),
//            new BodyPartResource($this->whenLoaded(BraceletRelationshipsEnum::BODY_PART->value)),
        ];
    }
}
