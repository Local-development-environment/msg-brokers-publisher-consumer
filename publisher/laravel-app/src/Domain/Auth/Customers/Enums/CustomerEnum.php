<?php

namespace Domain\Auth\Customers\Enums;

enum CustomerEnum: string
{
    case RESOURCE     = 'customers';
    case TABLE        = 'jw_users.customers';
    case PRIMARY_KEY  = 'id';
}
