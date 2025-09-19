<?php

namespace Domain\Auth\AuthEmployees\Enums;

enum AuthEmployeeEnum: string
{
    case RESOURCE     = 'vEmployees';
    case TABLE        = 'jw_users.v_employees';
    case PRIMARY_KEY  = 'id';
}
