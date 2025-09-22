<?php

namespace Domain\Users\Customers\Enums;

enum CustomerNameRoutesEnum: string
{
    case CUSTOMER_REGISTER = 'customer.register';
    case CUSTOMER_LOGIN    = 'customer.login';
    case CUSTOMER_LOGOUT   = 'customer.logout';
    case CUSTOMER_REFRESH  = 'customer.refresh';
    case CUSTOMER_PROFILE  = 'customer.profile';
}
