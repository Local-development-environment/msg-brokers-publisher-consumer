<?php

namespace UserDomain\Users\RegisterPhones\Enums;

enum RegisterPhoneEnum: string
{
    case TYPE_RESOURCE     = 'registerPhones';
    case TABLE_NAME        = 'jw_users.register_phones';
    case PRIMARY_KEY  = 'id';
}
