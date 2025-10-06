<?php

namespace Domain\Users\VEmployees\Models;

use Domain\Users\VEmployees\Enums\VEmployeeEnum;
use Illuminate\Database\Eloquent\Model;

class VEmployee extends Model
{
    protected $table = VEmployeeEnum::TABLE_NAME->value;

    public const string TYPE_TYPE_RESOURCE = VEmployeeEnum::TYPE_RESOURCE->value;
}
