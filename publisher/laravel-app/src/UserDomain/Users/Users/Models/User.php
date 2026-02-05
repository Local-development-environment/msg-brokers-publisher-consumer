<?php

declare(strict_types=1);

namespace UserDomain\Users\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use UserDomain\Users\Genders\Models\Gender;
use UserDomain\Users\RegisterPhones\Models\RegisterPhone;
use UserDomain\Users\Users\Enums\UserEnum;
use UserDomain\Users\UserTypes\Models\UserType;
use UserDomain\Users\UserUserTypes\Enums\UserUserTypeEnum;
use UserDomain\Users\UserUserTypes\Models\UserUserType;

final class User extends Model
{
    protected $table = UserEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = UserEnum::RESOURCE->value;

    public function userUserTypes(): HasMany
    {
        return $this->hasMany(UserUserType::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function userTypes(): BelongsToMany
    {
        return $this->belongsToMany(UserType::class, UserUserTypeEnum::TABLE_NAME->value);
    }

    public function registerPhone(): BelongsTo
    {
        return $this->belongsTo(RegisterPhone::class);
    }
}
