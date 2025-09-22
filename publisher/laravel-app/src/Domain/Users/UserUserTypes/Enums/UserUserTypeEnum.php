<?php

namespace Domain\Users\UserUserTypes\Enums;

enum UserUserTypeEnum: string
{
    case RESOURCE     = 'userUserTypes';
    case TABLE        = 'jw_users.user_user_type';
    case PRIMARY_KEY  = 'id';
}
