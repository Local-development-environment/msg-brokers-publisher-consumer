<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\ImitationStones\Resources;

use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Enums\ImitationStoneEnum;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Enums\ImitationStoneNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Enums\ImitationStoneRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Models\ImitationStone;

/** @mixin ImitationStone */
final class ImitationStoneResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd($this->resource);
        return [
            'id' => $this->id,
            'type' => ImitationStoneEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                ImitationStoneRelationshipsEnum::STONE->value => $this->sectionRelationships(
                    ImitationStoneNameRoutesEnum::RELATED_TO_STONE->value,
                    ImitationStoneRelationshipsEnum::STONE->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new StoneResource($this->whenLoaded(ImitationStoneRelationshipsEnum::STONE->value))
        ];
    }
}
