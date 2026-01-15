<?php
declare(strict_types=1);

namespace App\Http\Admin\Users\Admins\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Users\VAdmins\Models\VAdmin;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin VAdmin */
final class VAdminResource extends JsonResource
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
            'type' => VAdmin::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
        ];
    }

    protected function relations(): array
    {
        return [

        ];
    }
}
