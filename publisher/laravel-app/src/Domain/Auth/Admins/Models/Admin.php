<?php

declare(strict_types=1);

namespace Domain\Auth\Admins\Models;

use Domain\Auth\Admins\Enums\AdminEnum;
use Domain\Shared\Models\BaseModel;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

final class Admin extends BaseModel implements JWTSubject
{
    protected $table = AdminEnum::TABLE->value;

    public const string TYPE_RESOURCE = AdminEnum::RESOURCE->value;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}