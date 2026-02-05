<?php

namespace UserDomain\Users\Customers\Enums;

enum CustomerEnum: string
{
    case TYPE_RESOURCE     = 'customers';
    case TABLE_NAME        = 'jw_users.customers';
    case PRIMARY_KEY  = 'id';
}
