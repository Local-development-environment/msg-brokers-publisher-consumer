<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletType\Resources;

use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources\BraceletResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Bracelets\BraceletTypes\Enums\BraceletTypeNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\BraceletTypes\Enums\BraceletTypeRelationshipsEnum;
use Domain\JewelleryProperties\Bracelets\BraceletTypes\Models\BraceletType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BraceletType */
final class BraceletTypeResource extends JsonResource
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
            'type' => BraceletType::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                BraceletTypeRelationshipsEnum::BRACELETS->value => $this->sectionRelationships(
                    BraceletTypeNameRoutesEnum::RELATED_TO_BRACELETS->value,
                    BraceletTypeRelationshipsEnum::BRACELETS->value
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            BraceletResource::collection($this->whenLoaded(BraceletTypeRelationshipsEnum::BRACELETS->value))
        ];
    }
}
