<?php

namespace Domain\Users\RegisterPhones\Enums;

enum RegisterPhoneNameRoutesEnum: string
{
    case REGISTER_PHONE_INDEX  = 'register-phones.index';
    case REGISTER_PHONE_SHOW   = 'register-phones.show';
    case REGISTER_PHONE_STORE  = 'register-phones.store';
    case REGISTER_PHONE_UPDATE = 'register-phones.update';
    case REGISTER_PHONE_DELETE = 'register-phones.delete';
}
