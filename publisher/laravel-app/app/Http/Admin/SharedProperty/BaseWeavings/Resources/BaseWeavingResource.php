<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\BaseWeavings\Resources;

use App\Http\Admin\SharedProperty\Weaving\Resources\WeavingResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingNameRoutesEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingRelationshipsEnum;
use Domain\Shared\JewelleryProperties\BaseWeavings\Models\BaseWeaving;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BaseWeaving */
final class BaseWeavingResource extends JsonResource
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
            'type' => BaseWeaving::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                BaseWeavingRelationshipsEnum::WEAVINGS->value => $this->sectionRelationships(
                    BaseWeavingNameRoutesEnum::RELATED_TO_WEAVINGS->value,
                    BaseWeavingRelationshipsEnum::WEAVINGS->value
                ),
            ]
        ];
    }

    function relations(): array
    {
        return [
            WeavingResource::collection($this->whenLoaded(BaseWeavingRelationshipsEnum::WEAVINGS->value)),
        ];
    }
}
