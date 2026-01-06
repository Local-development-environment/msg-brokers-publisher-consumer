<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletWeaving\Resources;

use App\Http\Admin\SharedProperty\Weaving\Resources\WeavingResource;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources\BraceletResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Enums\BraceletWeavingNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Enums\BraceletWeavingRelationshipsEnum;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Models\BraceletWeaving;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BraceletWeaving */
final class BraceletWeavingResource extends JsonResource
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
            'type' => BraceletWeaving::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                BraceletWeavingRelationshipsEnum::WEAVING->value => $this->sectionRelationships(
                    BraceletWeavingNameRoutesEnum::RELATED_TO_WEAVING->value,
                    BraceletWeavingRelationshipsEnum::WEAVING->value,
                ),
                BraceletWeavingRelationshipsEnum::BRACELET->value => $this->sectionRelationships(
                    BraceletWeavingNameRoutesEnum::RELATED_TO_BRACELET->value,
                    BraceletWeavingRelationshipsEnum::BRACELET->value,
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            new WeavingResource($this->whenLoaded(BraceletWeavingRelationshipsEnum::WEAVING->value)),
            new BraceletResource($this->whenLoaded(BraceletWeavingRelationshipsEnum::BRACELET->value)),
        ];
    }
}
