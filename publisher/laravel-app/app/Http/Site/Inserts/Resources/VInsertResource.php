<?php
declare(strict_types=1);

namespace App\Http\Site\Inserts\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Inserts\InsertViews\Models\VInsert;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin VInsert
 * @property mixed $jewellery_id
 */
final class VInsertResource extends JsonResource
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
            'id' => $this->jewellery_id,
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
