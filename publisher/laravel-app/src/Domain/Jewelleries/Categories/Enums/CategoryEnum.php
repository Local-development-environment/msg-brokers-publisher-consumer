<?php

namespace Domain\Jewelleries\Categories\Enums;

enum CategoryEnum: string
{
    case TYPE_RESOURCE = 'categories';
    case TABLE_NAME    = 'jewelleries.categories';
    case FK_CATEGORY   = 'jewelleries.categories.id';
}
