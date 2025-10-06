<?php

declare(strict_types=1);

namespace App\Http\Shared\Resources\Identifiers;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiEntityIdentifierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray(Request $request): array|\JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'type' => $this->resource::TYPE_TYPE_RESOURCE,
        ];
    }
}
