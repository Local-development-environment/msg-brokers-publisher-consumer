<?php

declare(strict_types=1);

namespace UserDomain\Users\Genders\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use UserDomain\Users\Genders\Enums\GenderEnum;
use UserDomain\Users\Users\Models\User;

final class Gender extends Model
{
    protected $table = GenderEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = GenderEnum::RESOURCE->value;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
