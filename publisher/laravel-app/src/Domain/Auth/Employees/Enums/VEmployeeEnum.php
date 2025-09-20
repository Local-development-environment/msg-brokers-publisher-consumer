<?php

namespace Domain\Auth\Employees\Enums;

enum VEmployeeEnum: string
{
    case RESOURCE     = 'vEmployees';
    case TABLE        = 'jw_users.v_employees';
    case PRIMARY_KEY  = 'id';
}
