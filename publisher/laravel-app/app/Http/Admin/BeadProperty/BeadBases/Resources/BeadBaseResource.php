<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadBases\Resources;

use App\Http\Admin\BeadProperty\Beads\Resources\BeadCollection;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseRelationshipsEnum;
use Domain\JewelleryProperties\Beads\BeadBases\Models\BeadBase;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BeadBase */
final class BeadBaseResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => BeadBase::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'beads' => $this->sectionRelationships(
                    BeadBaseNameRoutesEnum::RELATED_TO_BEADS->value,
                    BeadCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            BeadCollection::class => $this->whenLoaded(BeadBaseRelationshipsEnum::BEADS->value)
        ];
    }
}
