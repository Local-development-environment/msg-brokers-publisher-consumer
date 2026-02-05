<?php

namespace UserDomain\Users\Genders\Enums;

enum GenderEnum: string
{   case RESOURCE     = 'genders';
    case TABLE_NAME        = 'jw_users.genders';
    case PRIMARY_KEY  = 'id';
}
