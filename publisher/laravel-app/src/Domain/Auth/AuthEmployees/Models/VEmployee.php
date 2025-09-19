<?php

namespace Domain\Auth\AuthEmployees\Models;

use Domain\Auth\AuthEmployees\Enums\AuthEmployeeEnum;
use Domain\Shared\Models\BaseModel;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class VEmployee extends BaseModel implements JWTSubject
{
    protected $table = AuthEmployeeEnum::TABLE->value;

    public const string TYPE_RESOURCE = AuthEmployeeEnum::RESOURCE->value;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
