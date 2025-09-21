<?php

namespace Domain\Users\RegisterPhones\Models;

use Domain\Users\RegisterPhones\Enums\RegisterPhoneEnum;
use Illuminate\Database\Eloquent\Model;

class RegisterPhone extends Model
{
    protected $table = RegisterPhoneEnum::TABLE->value;

    public const string TYPE_RESOURCE = RegisterPhoneEnum::RESOURCE->value;
}
