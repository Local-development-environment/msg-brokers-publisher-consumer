<?php

namespace UserDomain\Users\VCustomers\Enums;

enum VCustomerEnum: string
{
    case TYPE_RESOURCE     = 'vCustomers';
    case TABLE_NAME        = 'jw_users.v_customers';
    case PRIMARY_KEY  = 'id';
}
