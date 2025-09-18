<?php

namespace Domain\Auth\AuthAdmins\Enums;

enum AuthAdminEnum: string
{
    case RESOURCE     = 'vAdmins';
    case TABLE        = 'jw_users.v_admins';
    case PRIMARY_KEY  = 'id';
}
