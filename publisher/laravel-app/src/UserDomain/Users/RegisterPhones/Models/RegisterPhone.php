<?php

namespace UserDomain\Users\RegisterPhones\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use UserDomain\Users\RegisterPhones\Enums\RegisterPhoneEnum;
use UserDomain\Users\Users\Models\User;

class RegisterPhone extends Model
{
    protected $table = RegisterPhoneEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = RegisterPhoneEnum::RESOURCE->value;

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
