<?php

namespace Domain\Auth\AuthCustomers\Enums;

enum AuthCustomerEnum: string
{
    case RESOURCE     = 'vCustomers';
    case TABLE        = 'jw_users.v_customers';
    case PRIMARY_KEY  = 'id';
}
