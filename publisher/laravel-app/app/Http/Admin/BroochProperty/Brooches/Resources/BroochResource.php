<?php
declare(strict_types=1);

namespace App\Http\Admin\BroochProperty\Brooches\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\JewelleryProperties\Brooches\Brooches\Enums\BroochNameRoutesEnum;
use Domain\JewelleryProperties\Brooches\Brooches\Enums\BroochRelationshipsEnum;
use Domain\JewelleryProperties\Brooches\Brooches\Models\Brooch;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Brooch */
final class BroochResource extends JsonResource
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
            'type' => Brooch::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                'jewellery' => $this->sectionRelationships(
                    BroochNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    JewelleryResource::class
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            JewelleryResource::class => $this->whenLoaded(BroochRelationshipsEnum::JEWELLERY->value),
        ];
    }
}
