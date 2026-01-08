<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\TypeOrigins\Resources;

use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginNameRoutesEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginRelationshipsEnum;
use Domain\Inserts\TypeOrigins\Models\TypeOrigin;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin TypeOrigin */
final class TypeOriginResource extends JsonResource
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
            'type' => TypeOriginEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
            'relationships' => [
                TypeOriginRelationshipsEnum::STONES->value => $this->sectionRelationships(
                    TypeOriginNameRoutesEnum::RELATED_TO_STONES->value,
                    TypeOriginRelationshipsEnum::STONES->value
                )
            ]
        ];
    }

    protected function relations(): array
    {
        return [
            StoneResource::collection($this->whenLoaded(TypeOriginRelationshipsEnum::STONES->value)),
        ];
    }
}
