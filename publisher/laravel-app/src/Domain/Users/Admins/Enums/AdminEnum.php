<?php

namespace Domain\Users\Admins\Enums;

enum AdminEnum: string
{
    case RESOURCE     = 'admins';
    case TABLE        = 'jw_users.admins';
    case PRIMARY_KEY  = 'id';
}
