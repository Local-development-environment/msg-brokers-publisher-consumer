<?php

namespace Domain\Auth\Employees\Models;

use Domain\Auth\Employees\Enums\VEmployeeEnum;
use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class VEmployee extends Model
{
    protected $table = VEmployeeEnum::TABLE->value;

    public const string TYPE_RESOURCE = VEmployeeEnum::RESOURCE->value;
}
