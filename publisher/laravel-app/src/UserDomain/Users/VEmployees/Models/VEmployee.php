<?php

namespace UserDomain\Users\VEmployees\Models;

use Illuminate\Database\Eloquent\Model;
use UserDomain\Users\VEmployees\Enums\VEmployeeEnum;

class VEmployee extends Model
{
    protected $table = VEmployeeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = VEmployeeEnum::TYPE_RESOURCE->value;
}
