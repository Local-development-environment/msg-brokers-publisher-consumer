<?php

namespace UserDomain\Users\Employees\Enums;

enum EmployeeNameRoutesEnum: string
{
    case EMPLOYEE_REGISTER = 'employee.register';
    case EMPLOYEE_LOGIN    = 'employee.login';
    case EMPLOYEE_LOGOUT   = 'employee.logout';
    case EMPLOYEE_REFRESH  = 'employee.refresh';
    case EMPLOYEE_PROFILE  = 'employee.profile';
}
