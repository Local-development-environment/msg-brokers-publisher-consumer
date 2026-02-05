<?php

namespace UserDomain\Users\Employees\Enums;

enum EmployeeEnum: string
{
    case TYPE_RESOURCE     = 'employees';
    case TABLE_NAME        = 'jw_users.employees';
    case PRIMARY_KEY  = 'id';
}
