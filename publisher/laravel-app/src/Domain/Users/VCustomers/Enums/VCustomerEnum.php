<?php

namespace Domain\Users\VCustomers\Enums;

enum VCustomerEnum: string
{
    case RESOURCE     = 'vCustomers';
    case TABLE        = 'jw_users.v_customers';
    case PRIMARY_KEY  = 'id';
}
