<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Admin\SharedProperty\Weaving\Resources\WeavingResource;
use App\Http\Admin\SpecProperties\Bracelets\BodyPart\Resources\BodyPartResource;
use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Resources\BraceletMetricResource;
use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Resources\BraceletSizeResource;
use App\Http\Admin\SpecProperties\Bracelets\BraceletType\Resources\BraceletTypeResource;
use App\Http\Admin\SpecProperties\Bracelets\BraceletWeaving\Resources\BraceletWeavingResource;
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
                BraceletRelationshipsEnum::JEWELLERY->value         => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    BraceletRelationshipsEnum::JEWELLERY->value,
                ),
                BraceletRelationshipsEnum::BRACELET_METRICS->value  => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_BRACELET_METRICS->value,
                    BraceletRelationshipsEnum::BRACELET_METRICS->value,
                ),
                BraceletRelationshipsEnum::BRACELET_SIZES->value    => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_BRACELET_SIZES->value,
                    BraceletRelationshipsEnum::BRACELET_SIZES->value,
                ),
                BraceletRelationshipsEnum::CLASP->value             => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_CLASP->value,
                    BraceletRelationshipsEnum::CLASP->value,
                ),
                BraceletRelationshipsEnum::BODY_PART->value         => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_BODY_PART->value,
                    BraceletRelationshipsEnum::BODY_PART->value,
                ),
                BraceletRelationshipsEnum::BRACELET_WEAVINGS->value => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_BRACELET_WEAVINGS->value,
                    BraceletRelationshipsEnum::BRACELET_WEAVINGS->value,
                ),
                BraceletRelationshipsEnum::BRACELET_BASE->value => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_BRACELET_TYPE->value,
                    BraceletRelationshipsEnum::BRACELET_BASE->value,
                ),
                BraceletRelationshipsEnum::WEAVINGS->value => $this->sectionRelationships(
                    BraceletNameRoutesEnum::RELATED_TO_WEAVINGS->value,
                    BraceletRelationshipsEnum::WEAVINGS->value,
                )
            ]
        ];
    }

    private function relations(): array
    {
//        dd(new BodyPartResource($this->whenLoaded(BraceletRelationshipsEnum::BODY_PART->value)));
        return [
            BraceletMetricResource::collection($this->whenLoaded(BraceletRelationshipsEnum::BRACELET_METRICS->value)),
            BraceletSizeResource::collection($this->whenLoaded(BraceletRelationshipsEnum::BRACELET_SIZES->value)),
            new JewelleryResource($this->whenLoaded(BraceletRelationshipsEnum::JEWELLERY->value)),
            new ClaspResource($this->whenLoaded(BraceletRelationshipsEnum::CLASP->value)),
            new BodyPartResource($this->whenLoaded(BraceletRelationshipsEnum::BODY_PART->value)),
            new BraceletTypeResource($this->whenLoaded(BraceletRelationshipsEnum::BRACELET_BASE->value)),
            BraceletWeavingResource::collection($this->whenLoaded(BraceletRelationshipsEnum::BRACELET_WEAVINGS->value)),
            WeavingResource::collection($this->whenLoaded(BraceletRelationshipsEnum::WEAVINGS->value)),
        ];
    }
}
