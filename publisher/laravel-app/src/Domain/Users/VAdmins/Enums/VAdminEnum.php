<?php

namespace Domain\Users\VAdmins\Enums;

enum VAdminEnum: string
{
    case TYPE_RESOURCE     = 'vAdmins';
    case TABLE_NAME        = 'jw_users.v_admins';
    case PRIMARY_KEY  = 'id';
}
