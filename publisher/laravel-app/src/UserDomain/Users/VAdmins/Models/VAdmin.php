<?php
declare(strict_types=1);

namespace UserDomain\Users\VAdmins\Models;

use Illuminate\Database\Eloquent\Model;
use UserDomain\Users\VAdmins\Enums\VAdminEnum;

class VAdmin extends Model
{
    protected $table = VAdminEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = VAdminEnum::TYPE_RESOURCE->value;
}
