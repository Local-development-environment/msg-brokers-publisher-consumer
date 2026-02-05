<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\Weaving\Resources;

use App\Http\Admin\SharedProperty\BaseWeavings\Resources\BaseWeavingResource;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources\BraceletResource;
use App\Http\Admin\SpecProperties\Bracelets\BraceletWeaving\Resources\BraceletWeavingResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums\WeavingNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums\WeavingRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Models\Weaving;

/** @mixin Weaving */
final class WeavingResource extends JsonResource
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
            'type' => Weaving::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                WeavingRelationshipsEnum::BRACELET_WEAVINGS->value => $this->sectionRelationships(
                    WeavingNameRoutesEnum::RELATED_TO_BRACELET_WEAVINGS->value,
                    WeavingRelationshipsEnum::BRACELET_WEAVINGS->value,
                ),
                WeavingRelationshipsEnum::BASE_WEAVING->value => $this->sectionRelationships(
                    WeavingNameRoutesEnum::RELATED_TO_BASE_WEAVING->value,
                    WeavingRelationshipsEnum::BASE_WEAVING->value,
                ),
                WeavingRelationshipsEnum::BRACELETS->value => $this->sectionRelationships(
                    WeavingNameRoutesEnum::RELATED_TO_BRACELETS->value,
                    WeavingRelationshipsEnum::BRACELETS->value,
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new BraceletWeavingResource($this->whenLoaded(WeavingRelationshipsEnum::BRACELET_WEAVINGS->value)),
            new BaseWeavingResource($this->whenLoaded(WeavingRelationshipsEnum::BASE_WEAVING->value)),
            BraceletResource::collection($this->whenLoaded(WeavingRelationshipsEnum::BRACELETS->value))
        ];
    }
}
