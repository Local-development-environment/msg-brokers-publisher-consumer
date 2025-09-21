<?php

namespace Domain\Users\VUsers\Models;

use Domain\Users\VUsers\Enums\VUserEnum;
use Illuminate\Database\Eloquent\Model;

class VUser extends Model
{
    protected $table = VUserEnum::TABLE->value;

    public const string TYPE_RESOURCE = VUserEnum::RESOURCE->value;
}
