<?php

declare(strict_types=1);

namespace Domain\Users\Users\Models;

use Domain\Users\Genders\Models\Gender;
use Domain\Users\RegisterPhones\Models\RegisterPhone;
use Domain\Users\Users\Enums\UserEnum;
use Domain\Users\UserTypes\Models\UserType;
use Domain\Users\UserUserTypes\Enums\UserUserTypeEnum;
use Domain\Users\UserUserTypes\Models\UserUserType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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