<?php

declare(strict_types=1);

namespace Domain\Users\Employees\Models;

use Domain\Shared\Models\BaseModel;
use Domain\Users\Employees\Enums\EmployeeEnum;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

final class Employee extends BaseModel implements JWTSubject
{
    protected $table = EmployeeEnum::TABLE->value;

    public const string TYPE_RESOURCE = EmployeeEnum::RESOURCE->value;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}