<?php

namespace JewelleryDomain\Jewelleries\Inserts\InsertTypes\Enums;

enum InsertTypeEnum: string
{
    case TYPE_RESOURCE = 'insertTypes';
    case TABLE_NAME    = 'jw_inserts.insert_types';
    case PRIMARY_KEY   = 'id';
}
