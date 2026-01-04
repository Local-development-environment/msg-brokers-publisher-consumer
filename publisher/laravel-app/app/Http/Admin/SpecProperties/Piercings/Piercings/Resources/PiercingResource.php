<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Piercings\Piercings\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingNameRoutesEnum;
use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingRelationshipsEnum;
use Domain\JewelleryProperties\Piercings\Piercings\Models\Piercing;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Piercing */
final class PiercingResource extends JsonResource
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
            'type' => Piercing::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'jewellery' => $this->sectionRelationships(
                    PiercingNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    JewelleryResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            JewelleryResource::class => $this->whenLoaded(PiercingRelationshipsEnum::JEWELLERY->value),
        ];
    }
}
