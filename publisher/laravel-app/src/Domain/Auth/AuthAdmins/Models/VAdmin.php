<?php

namespace Domain\Auth\AuthAdmins\Models;

use Domain\Auth\AuthAdmins\Enums\AuthAdminEnum;
use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class VAdmin  extends BaseModel implements JWTSubject
{
    protected $table = AuthAdminEnum::TABLE->value;

    public const string TYPE_RESOURCE = AuthAdminEnum::RESOURCE->value;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
