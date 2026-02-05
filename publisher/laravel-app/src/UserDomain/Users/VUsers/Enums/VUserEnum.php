<?php

namespace UserDomain\Users\VUsers\Enums;

enum VUserEnum: string
{
    case TYPE_RESOURCE     = 'vUsers';
    case TABLE_NAME        = 'jw_users.v_users';
    case PRIMARY_KEY  = 'id';
}
