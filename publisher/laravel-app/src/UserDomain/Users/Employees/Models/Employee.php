<?php

declare(strict_types=1);

namespace UserDomain\Users\Employees\Models;

use Domain\Shared\Models\BaseModel;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use UserDomain\Users\Employees\Enums\EmployeeEnum;

final class Employee extends BaseModel implements JWTSubject
{
    protected $table = EmployeeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = EmployeeEnum::TYPE_RESOURCE->value;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
