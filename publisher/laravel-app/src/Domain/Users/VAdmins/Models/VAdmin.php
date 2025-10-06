<?php
declare(strict_types=1);

namespace Domain\Users\VAdmins\Models;

use Domain\Users\VAdmins\Enums\VAdminEnum;
use Illuminate\Database\Eloquent\Model;

class VAdmin extends Model
{
    protected $table = VAdminEnum::TABLE_NAME->value;

    public const string TYPE_TYPE_RESOURCE = VAdminEnum::TYPE_RESOURCE->value;
}
