<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\Clasps\Resources;

use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadCollection;
use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadResource;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources\BraceletResource;
use App\Http\Admin\SpecProperties\Chains\Chain\Resources\ChainResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspNameRoutesEnum;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspRelationshipsEnum;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Clasp */
final class ClaspResource extends JsonResource
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
            'type' => Clasp::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                ClaspRelationshipsEnum::BEADS->value => $this->sectionRelationships(
                    ClaspNameRoutesEnum::RELATED_TO_BEADS->value,
                    ClaspRelationshipsEnum::BEADS->value
                ),
                ClaspRelationshipsEnum::BRACELETS->value => $this->sectionRelationships(
                    ClaspNameRoutesEnum::RELATED_TO_BRACELETS->value,
                    ClaspRelationshipsEnum::BRACELETS->value
                ),
                ClaspRelationshipsEnum::CHAINS->value => $this->sectionRelationships(
                    ClaspNameRoutesEnum::RELATED_TO_CHAINS->value,
                    ClaspRelationshipsEnum::CHAINS->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            BeadResource::collection($this->whenLoaded(ClaspRelationshipsEnum::BEADS->value)),
            BraceletResource::collection($this->whenLoaded(ClaspRelationshipsEnum::BRACELETS->value)),
            ChainResource::collection($this->whenLoaded(ClaspRelationshipsEnum::CHAINS->value)),
        ];
    }
}
