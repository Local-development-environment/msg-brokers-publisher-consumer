<?php
declare(strict_types=1);

namespace app\Http\Admin\SpecProperties\Brooches\Brooch\Resources;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Enums\BroochNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Enums\BroochRelationshipsEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Models\Brooch;

/** @mixin Brooch */
final class BroochResource extends JsonResource
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
            'type' => Brooch::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                BroochRelationshipsEnum::JEWELLERY->value => $this->sectionRelationships(
                    BroochNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    BroochRelationshipsEnum::JEWELLERY->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new JewelleryResource($this->whenLoaded(BroochRelationshipsEnum::JEWELLERY->value)),
        ];
    }
}
