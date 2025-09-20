<?php

namespace Domain\Auth\Customers\Models;

use Domain\Auth\Customers\Enums\VCustomerEnum;
use Domain\Shared\Models\BaseModel;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class VCustomer extends Model
{
    protected $table = VCustomerEnum::TABLE->value;

    public const string TYPE_RESOURCE = VCustomerEnum::RESOURCE->value;
}
