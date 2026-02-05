<?php

declare(strict_types=1);

namespace UserDomain\Users\Customers\Models;

use Domain\Shared\Models\BaseModel;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use UserDomain\Users\Customers\Enums\CustomerEnum;

final class Customer extends BaseModel implements JWTSubject
{
    protected $table = CustomerEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = CustomerEnum::TYPE_RESOURCE->value;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
