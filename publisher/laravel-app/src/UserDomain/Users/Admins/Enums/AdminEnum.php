<?php

namespace UserDomain\Users\Admins\Enums;

enum AdminEnum: string
{
    case TYPE_RESOURCE     = 'admins';
    case TABLE_NAME        = 'jw_users.admins';
    case PRIMARY_KEY  = 'id';
}
