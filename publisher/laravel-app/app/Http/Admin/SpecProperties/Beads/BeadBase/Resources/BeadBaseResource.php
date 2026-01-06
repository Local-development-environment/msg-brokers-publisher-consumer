<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadBase\Resources;

use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseRelationshipsEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BeadBase */
final class BeadBaseResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'type'          => BeadBase::TYPE_RESOURCE,
            'attributes'    => $this->attributeItems(),
            'relationships' => [
                BeadBaseRelationshipsEnum::BEADS->value => $this->sectionRelationships(
                    BeadBaseNameRoutesEnum::RELATED_TO_BEADS->value,
                    BeadBaseRelationshipsEnum::BEADS->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
             BeadResource::collection($this->whenLoaded(BeadBaseRelationshipsEnum::BEADS->value))
        ];
    }
}
