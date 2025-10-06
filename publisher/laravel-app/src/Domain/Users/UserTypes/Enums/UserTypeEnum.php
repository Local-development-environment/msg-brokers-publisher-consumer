<?php

namespace Domain\Users\UserTypes\Enums;

enum UserTypeEnum: string
{
    case RESOURCE     = 'userTypes';
    case TABLE_NAME        = 'jw_users.user_types';
    case PRIMARY_KEY  = 'id';
}
