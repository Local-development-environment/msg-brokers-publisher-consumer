<?php

declare(strict_types=1);

namespace Domain\Users\Genders\Models;

use Domain\Users\Genders\Enums\GenderEnum;
use Domain\Users\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Gender extends Model
{
    protected $table = GenderEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = GenderEnum::RESOURCE->value;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}