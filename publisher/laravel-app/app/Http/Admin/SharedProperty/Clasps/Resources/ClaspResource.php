<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\Clasps\Resources;

use App\Http\Admin\BeadProperty\BeadBases\Resources\BeadBaseCollection;
use App\Http\Admin\BeadProperty\Beads\Resources\BeadCollection;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspNameRoutesEnum;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspRelationshipsEnum;
use Domain\Shared\JewelleryProperties\Clasps\Models\Clasp;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Clasp */
final class ClaspResource extends JsonResource
{
    use IncludeRelatedEntitiesResourceTrait;

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
                'beads' => $this->sectionRelationships(
                    ClaspNameRoutesEnum::RELATED_TO_BEADS->value,
                    BeadCollection::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            BeadCollection::class => $this->whenLoaded(ClaspRelationshipsEnum::BEADS->value)
        ];
    }
}
