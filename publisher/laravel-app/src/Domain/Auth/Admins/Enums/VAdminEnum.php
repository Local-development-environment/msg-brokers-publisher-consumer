<?php

namespace Domain\Auth\Admins\Enums;

enum VAdminEnum: string
{
    case RESOURCE     = 'vAdmins';
    case TABLE        = 'jw_users.v_admins';
    case PRIMARY_KEY  = 'id';
}
