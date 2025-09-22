<?php

namespace Domain\Users\UserTypes\Enums;

enum UserTypeNameRoutesEnum: string
{
    case USER_TYPE_REGISTER = 'user-type.register';
    case USER_TYPE_LOGIN    = 'user-type.login';
    case USER_TYPE_LOGOUT   = 'user-type.logout';
    case USER_TYPE_REFRESH  = 'user-type.refresh';
    case USER_TYPE_PROFILE  = 'user-type.profile';
}
