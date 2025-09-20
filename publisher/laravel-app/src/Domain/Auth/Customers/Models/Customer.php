<?php

declare(strict_types=1);

namespace Domain\Auth\Customers\Models;

use Domain\Auth\Customers\Enums\CustomerEnum;
use Domain\Shared\Models\BaseModel;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

final class Customer extends BaseModel implements JWTSubject
{
    protected $table = CustomerEnum::TABLE->value;

    public const string TYPE_RESOURCE = CustomerEnum::RESOURCE->value;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}