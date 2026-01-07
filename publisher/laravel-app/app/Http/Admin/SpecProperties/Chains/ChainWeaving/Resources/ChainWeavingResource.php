<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\ChainWeaving\Resources;

use App\Http\Admin\SharedProperty\Weaving\Resources\WeavingResource;
use App\Http\Admin\SpecProperties\Chains\Chain\Resources\ChainResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Chains\ChainWeavings\Enums\ChainWeavingNameRoutesEnum;
use Domain\JewelleryProperties\Chains\ChainWeavings\Enums\ChainWeavingRelationshipsEnum;
use Domain\JewelleryProperties\Chains\ChainWeavings\Models\ChainWeaving;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ChainWeaving */
final class ChainWeavingResource extends JsonResource
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
            'type' => ChainWeaving::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                ChainWeavingRelationshipsEnum::CHAIN->value => $this->sectionRelationships(
                    ChainWeavingNameRoutesEnum::RELATED_TO_CHAIN->value,
                    ChainWeavingRelationshipsEnum::CHAIN->value
                ),
            ]
        ];
    }

    function relations(): array
    {
        return [
            new ChainResource($this->whenLoaded(ChainWeavingRelationshipsEnum::CHAIN->value)),
            new WeavingResource($this->whenLoaded(ChainWeavingRelationshipsEnum::WEAVING->value)),
        ];
    }
}
