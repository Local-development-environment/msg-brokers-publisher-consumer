<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BodyPart\Resources;

use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources\BraceletResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Enums\BodyPartNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Enums\BodyPartRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BodyParts\Models\BodyPart;

/** @mixin BodyPart */
final class BodyPartResource extends JsonResource
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
            'type' => BodyPart::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                BodyPartRelationshipsEnum::BRACELETS->value => $this->sectionRelationships(
                    BodyPartNameRoutesEnum::RELATED_TO_BRACELETS->value,
                    BodyPartRelationshipsEnum::BRACELETS->value
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            BraceletResource::collection($this->whenLoaded(BodyPartRelationshipsEnum::BRACELETS->value))
        ];
    }
}
