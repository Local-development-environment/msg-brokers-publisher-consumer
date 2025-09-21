<?php

namespace Domain\Users\RegisterPhones\Enums;

enum RegisterPhoneEnum: string
{
    case RESOURCE     = 'registerPhones';
    case TABLE        = 'jw_users.register_phones';
    case PRIMARY_KEY  = 'id';
}
