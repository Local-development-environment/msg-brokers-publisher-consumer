<?php

namespace Domain\Users\Admins\Enums;

enum AdminNameRoutesEnum: string
{
    case ADMIN_REGISTER = 'admin.register';
    case ADMIN_LOGIN    = 'admin.login';
    case ADMIN_LOGOUT   = 'admin.logout';
    case ADMIN_REFRESH  = 'admin.refresh';
    case ADMIN_PROFILE  = 'admin.profile';
}
