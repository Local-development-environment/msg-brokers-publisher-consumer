<?php

namespace Domain\Auth\RegisterPhones\Models;

use Domain\Auth\RegisterPhones\Enums\RegisterPhoneEnum;
use Illuminate\Database\Eloquent\Model;

class RegisterPhone extends Model
{
    protected $table = RegisterPhoneEnum::TABLE->value;

    public const string TYPE_RESOURCE = RegisterPhoneEnum::RESOURCE->value;
}
