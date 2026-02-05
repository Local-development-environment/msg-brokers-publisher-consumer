<?php

namespace UserDomain\Users\VEmployees\Enums;

enum VEmployeeEnum: string
{
    case TYPE_RESOURCE     = 'vEmployees';
    case TABLE_NAME        = 'jw_users.v_employees';
    case PRIMARY_KEY  = 'id';
}
