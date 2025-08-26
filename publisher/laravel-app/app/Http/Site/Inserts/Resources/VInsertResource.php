<?php

namespace App\Http\Site\Inserts\Resources;

use Domain\Inserts\InsertViews\Models\VInsert;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;

/**
 * @mixin VInsert
 * @property mixed $id
 */
class VInsertResource extends JsonResource
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
            'type' => VInsert::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
        ];
    }

    protected function relations(): array
    {
        return [

        ];
    }
}
