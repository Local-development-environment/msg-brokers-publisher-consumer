<?php

namespace UserDomain\Users\UserUserTypes\Enums;

enum UserUserTypeEnum: string
{
    case TYPE_RESOURCE     = 'userUserTypes';
    case TABLE_NAME        = 'jw_users.user_user_type';
    case PRIMARY_KEY  = 'id';
}
