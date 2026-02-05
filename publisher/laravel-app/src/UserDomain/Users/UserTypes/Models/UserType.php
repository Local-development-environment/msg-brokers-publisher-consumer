<?php

declare(strict_types=1);

namespace UserDomain\Users\UserTypes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use UserDomain\Users\Users\Models\User;
use UserDomain\Users\UserTypes\Enums\UserTypeEnum;
use UserDomain\Users\UserUserTypes\Enums\UserUserTypeEnum;
use UserDomain\Users\UserUserTypes\Models\UserUserType;

final class UserType extends Model
{
    protected $table = UserTypeEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = UserTypeEnum::RESOURCE->value;

    public function userUserTypes(): HasMany
    {
        return $this->hasMany(UserUserType::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, UserUserTypeEnum::TABLE_NAME->value);
    }
}
