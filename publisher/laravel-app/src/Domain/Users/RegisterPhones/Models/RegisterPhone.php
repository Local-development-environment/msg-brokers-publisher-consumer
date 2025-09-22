<?php

namespace Domain\Users\RegisterPhones\Models;

use Domain\Users\RegisterPhones\Enums\RegisterPhoneEnum;
use Domain\Users\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RegisterPhone extends Model
{
    protected $table = RegisterPhoneEnum::TABLE->value;

    public const string TYPE_RESOURCE = RegisterPhoneEnum::RESOURCE->value;

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
