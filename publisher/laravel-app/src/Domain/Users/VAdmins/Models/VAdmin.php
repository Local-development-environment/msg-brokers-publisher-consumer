<?php
declare(strict_types=1);

namespace Domain\Users\VAdmins\Models;

use Domain\Users\VAdmins\Enums\VAdminEnum;
use Illuminate\Database\Eloquent\Model;

class VAdmin extends Model
{
    protected $table = VAdminEnum::TABLE->value;

    public const string TYPE_RESOURCE = VAdminEnum::RESOURCE->value;
}
