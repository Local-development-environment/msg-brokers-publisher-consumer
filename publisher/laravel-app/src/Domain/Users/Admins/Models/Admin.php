<?php

declare(strict_types=1);

namespace Domain\Users\Admins\Models;

use Domain\Shared\Models\BaseModel;
use Domain\Users\Admins\Enums\AdminEnum;
use Domain\Users\UserUserTypes\Models\UserUserType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

final class Admin extends BaseModel implements JWTSubject
{
    use HasRoles;

    protected $table = AdminEnum::TABLE_NAME->value;

    public const string TYPE_TYPE_RESOURCE = AdminEnum::TYPE_RESOURCE->value;

    public function userUserType(): BelongsTo
    {
        return $this->belongsTo(UserUserType::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}