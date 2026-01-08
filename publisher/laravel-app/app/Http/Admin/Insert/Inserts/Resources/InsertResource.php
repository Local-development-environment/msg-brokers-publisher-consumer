<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Inserts\Resources;

use App\Http\Admin\Insert\InsertOptionalInfos\Resources\InsertOptionalInfoResource;
use App\Http\Admin\Insert\StoneExteriors\Resources\StoneExteriorResource;
use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\Inserts\Enums\InsertNameRoutesEnum;
use Domain\Inserts\Inserts\Enums\InsertRelationshipsEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class InsertResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => InsertEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                InsertRelationshipsEnum::JEWELLERY->value => $this->sectionRelationships(
                    InsertNameRoutesEnum::RELATED_TO_JEWELLERY->value,
                    InsertRelationshipsEnum::JEWELLERY->value
                ),
                InsertRelationshipsEnum::INSERT_OPTIONAL_INFO->value => $this->sectionRelationships(
                    InsertNameRoutesEnum::RELATED_TO_INSERT_OPTIONAL_INFO->value,
                    InsertRelationshipsEnum::INSERT_OPTIONAL_INFO->value
                ),
                InsertRelationshipsEnum::STONE_EXTERIOR->value => $this->sectionRelationships(
                    InsertNameRoutesEnum::RELATED_TO_INSERT_STONE->value,
                    InsertRelationshipsEnum::STONE_EXTERIOR->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new JewelleryResource($this->whenLoaded(InsertRelationshipsEnum::JEWELLERY->value)),
            new InsertOptionalInfoResource($this->whenLoaded(InsertRelationshipsEnum::INSERT_OPTIONAL_INFO->value)),
            new StoneExteriorResource($this->whenLoaded(InsertRelationshipsEnum::STONE_EXTERIOR->value)),
        ];
    }
}
