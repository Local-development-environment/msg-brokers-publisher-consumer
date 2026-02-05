<?php

namespace UserDomain\Users\Users\Enums;

enum UserRelationshipsEnum: string
{
    case USER_USER_TYPES = 'userUserTypes';
    case REGISTER_PHONE  = 'registerPhone';
    case GENDER          = 'gender';
    case USER_TYPES      = 'userTypes';
}
