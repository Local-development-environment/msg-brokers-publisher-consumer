<?php

namespace UserDomain\Users\VCustomers\Models;

use Illuminate\Database\Eloquent\Model;
use UserDomain\Users\VCustomers\Enums\VCustomerEnum;

class VCustomer extends Model
{
    protected $table = VCustomerEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = VCustomerEnum::TYPE_RESOURCE->value;
}
