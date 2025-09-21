<?php

declare(strict_types=1);

namespace Domain\Users\Customers\Models;

use Domain\Shared\Models\BaseModel;
use Domain\Users\Customers\Enums\CustomerEnum;
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