<?php

namespace Domain\Users\Users\Enums;

enum UserEnum: string
{
    case RESOURCE     = 'users';
    case TABLE        = 'jw_users.users';
    case PRIMARY_KEY  = 'id';
}
