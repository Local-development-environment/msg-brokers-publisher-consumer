<?php

namespace Domain\Users\VUsers\Enums;

enum VUserEnum: string
{
    case RESOURCE     = 'vUsers';
    case TABLE        = 'jw_users.v_users';
    case PRIMARY_KEY  = 'id';
}
