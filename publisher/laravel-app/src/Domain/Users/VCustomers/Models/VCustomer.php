<?php

namespace Domain\Users\VCustomers\Models;

use Domain\Users\VCustomers\Enums\VCustomerEnum;
use Illuminate\Database\Eloquent\Model;

class VCustomer extends Model
{
    protected $table = VCustomerEnum::TABLE->value;

    public const string TYPE_RESOURCE = VCustomerEnum::RESOURCE->value;
}
