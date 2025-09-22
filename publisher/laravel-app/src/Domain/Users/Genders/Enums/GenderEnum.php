<?php

namespace Domain\Users\Genders\Enums;

enum GenderEnum: string
{   case RESOURCE     = 'genders';
    case TABLE        = 'jw_users.genders';
    case PRIMARY_KEY  = 'id';
}
