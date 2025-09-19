<?php

namespace Domain\Auth\AuthCustomers\Models;

use Domain\Auth\AuthCustomers\Enums\AuthCustomerEnum;
use Domain\Shared\Models\BaseModel;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class VCustomer extends BaseModel implements JWTSubject
{
    protected $table = AuthCustomerEnum::TABLE->value;

    public const string TYPE_RESOURCE = AuthCustomerEnum::RESOURCE->value;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
