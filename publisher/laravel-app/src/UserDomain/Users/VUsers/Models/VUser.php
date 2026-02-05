<?php

namespace UserDomain\Users\VUsers\Models;

use Illuminate\Database\Eloquent\Model;
use UserDomain\Users\VUsers\Enums\VUserEnum;

class VUser extends Model
{
    protected $table = VUserEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = VUserEnum::TYPE_RESOURCE->value;
}
