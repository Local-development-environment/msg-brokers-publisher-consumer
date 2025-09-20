<?php
declare(strict_types=1);

namespace Domain\Auth\Admins\Models;

use Domain\Auth\Admins\Enums\VAdminEnum;
use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class VAdmin extends Model
{
    protected $table = VAdminEnum::TABLE->value;

    public const string TYPE_RESOURCE = VAdminEnum::RESOURCE->value;
}
