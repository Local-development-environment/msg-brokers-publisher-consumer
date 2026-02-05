<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneGroups\Resources;

use App\Http\Admin\Insert\GroupGrades\Resources\GroupGradeResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Enums\StoneGroupEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Enums\StoneGroupNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Enums\StoneGroupRelationshipsEnum;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Models\StoneGroup;

/** @mixin StoneGroup */
final class StoneGroupResource extends JsonResource
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
            'type' => StoneGroupEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                StoneGroupRelationshipsEnum::GROUP_GRADES->value => $this->sectionRelationships(
                    StoneGroupNameRoutesEnum::RELATED_TO_GROUP_GRADES->value,
                    StoneGroupRelationshipsEnum::GROUP_GRADES->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            GroupGradeResource::collection($this->whenLoaded(StoneGroupRelationshipsEnum::GROUP_GRADES->value)),
        ];
    }
}
