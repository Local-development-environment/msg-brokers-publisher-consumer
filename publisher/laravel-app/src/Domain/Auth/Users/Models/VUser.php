<?php

namespace Domain\Auth\Users\Models;

use Domain\Auth\Users\Enums\VUserEnum;
use Illuminate\Database\Eloquent\Model;

class VUser extends Model
{
    protected $table = VUserEnum::TABLE->value;

    public const string TYPE_RESOURCE = VUserEnum::RESOURCE->value;
}
