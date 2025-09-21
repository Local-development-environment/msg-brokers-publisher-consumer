<?php

declare(strict_types=1);

namespace Domain\Users\Admins\Models;

use Domain\Shared\Models\BaseModel;
use Domain\Users\Admins\Enums\AdminEnum;
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