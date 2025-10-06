<?php
declare(strict_types=1);

namespace App\Http\Admin\Users\Users\Resources;

use App\Http\Shared\Resources\Traits\IncludeRelatedEntitiesResourceTrait;
use Domain\Users\VUsers\Enums\VUserEnum;
use Domain\Users\VUsers\Models\VUser;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin VUser */
class VUserResource extends JsonResource
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
            'type' => VUserEnum::TYPE_RESOURCE->value,
            'attributes' => $this->attributeItems(),
        ];
    }

    protected function relations(): array
    {
        return [

        ];
    }
}
