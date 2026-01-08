<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertOptionalInfos\Resources;

use App\Http\Admin\Insert\Inserts\Resources\InsertResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoNameRoutesEnum;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoRelationshipsEnum;
use Domain\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin InsertOptionalInfo */
final class InsertOptionalInfoResource extends JsonResource
{
    use JsonApiSpecificationResourceTrait;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => InsertOptionalInfoEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                InsertOptionalInfoRelationshipsEnum::INSERT->value => $this->sectionRelationships(
                    InsertOptionalInfoNameRoutesEnum::RELATED_TO_INSERT->value,
                    InsertOptionalInfoRelationshipsEnum::INSERT->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            new InsertResource($this->whenLoaded(InsertOptionalInfoRelationshipsEnum::INSERT->value)),
        ];
    }
}
