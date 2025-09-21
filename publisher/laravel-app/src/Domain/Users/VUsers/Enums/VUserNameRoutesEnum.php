<?php

namespace Domain\Users\VUsers\Enums;

enum VUserNameRoutesEnum: string
{
    case CRUD_INDEX              = 'v-users.index';
    case CRUD_SHOW               = 'v-users.show';
}
