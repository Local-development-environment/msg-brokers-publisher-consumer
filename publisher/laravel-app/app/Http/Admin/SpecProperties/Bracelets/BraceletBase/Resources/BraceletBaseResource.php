<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletBase\Resources;

use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Admin\SpecProperties\Bracelets\BodyPart\Resources\BodyPartResource;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources\BraceletResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseRelationshipsEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Models\BraceletBase;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BraceletBase */
final class BraceletBaseResource extends JsonResource
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
            'type' => BraceletBase::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                BraceletBaseRelationshipsEnum::CLASPS->value => $this->sectionRelationships(
                    BraceletBaseNameRoutesEnum::RELATED_TO_CLASPS->value,
                    BraceletBaseRelationshipsEnum::CLASPS->value
                ),
                BraceletBaseRelationshipsEnum::BRACELETS->value => $this->sectionRelationships(
                    BraceletBaseNameRoutesEnum::RELATED_TO_BRACELETS->value,
                    BraceletBaseRelationshipsEnum::BRACELETS->value
                ),
                BraceletBaseRelationshipsEnum::BODY_PARTS->value => $this->sectionRelationships(
                    BraceletBaseNameRoutesEnum::RELATED_TO_BODY_PARTS->value,
                    BraceletBaseRelationshipsEnum::BODY_PARTS->value
                )
            ]
        ];
    }

    function relations(): array
    {
        return [
            BraceletResource::collection($this->whenLoaded(BraceletBaseRelationshipsEnum::BRACELETS->value)),
            ClaspResource::collection($this->whenLoaded(BraceletBaseRelationshipsEnum::CLASPS->value)),
            BodyPartResource::collection($this->whenLoaded(BraceletBaseRelationshipsEnum::BODY_PARTS->value)),
        ];
    }
}
