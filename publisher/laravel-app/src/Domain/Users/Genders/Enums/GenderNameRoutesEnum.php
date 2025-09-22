<?php

namespace Domain\Users\Genders\Enums;

enum GenderNameRoutesEnum: string
{
    case GENDER_INDEX  = 'genders.index';
    case GENDER_SHOW   = 'genders.show';
    case GENDER_STORE  = 'genders.store';
    case GENDER_UPDATE = 'genders.update';
    case GENDER_DELETE = 'genders.delete';
}
