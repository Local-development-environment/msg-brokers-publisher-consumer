<?php
declare(strict_types=1);

namespace App\Http\Admin\Users\Employees\Resources;

use App\Http\Shared\Resources\Traits\JsonApiSpecificationResourceTrait;
use Domain\Users\VEmployees\Models\VEmployee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin VEmployee */
final class VEmployeeResource extends JsonResource
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
            'type' => VEmployee::TYPE_RESOURCE,
            'attributes' => $this->attributeItems(),
        ];
    }

    protected function relations(): array
    {
        return [

        ];
    }
}
