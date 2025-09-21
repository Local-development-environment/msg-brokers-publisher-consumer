<?php

namespace Domain\Users\VEmployees\Models;

use Domain\Users\VEmployees\Enums\VEmployeeEnum;
use Illuminate\Database\Eloquent\Model;

class VEmployee extends Model
{
    protected $table = VEmployeeEnum::TABLE->value;

    public const string TYPE_RESOURCE = VEmployeeEnum::RESOURCE->value;
}
