<?php

namespace Domain\Auth\Employees\Enums;

enum EmployeeEnum: string
{
    case RESOURCE     = 'employeess';
    case TABLE        = 'jw_users.employees';
    case PRIMARY_KEY  = 'id';
}
