<?php

declare(strict_types=1);

namespace Domain\Users\UserTypes\Models;

use Domain\Users\Users\Models\User;
use Domain\Users\UserTypes\Enums\UserTypeEnum;
use Domain\Users\UserUserTypes\Enums\UserUserTypeEnum;
use Domain\Users\UserUserTypes\Models\UserUserType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class UserType extends Model
{
    protected $table = UserTypeEnum::TABLE->value;

    public const string TYPE_RESOURCE = UserTypeEnum::RESOURCE->value;

    public function userUserTypes(): HasMany
    {
        return $this->hasMany(UserUserType::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, UserUserTypeEnum::TABLE->value);
    }
}