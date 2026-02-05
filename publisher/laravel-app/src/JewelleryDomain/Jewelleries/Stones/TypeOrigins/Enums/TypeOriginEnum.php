<?php

namespace JewelleryDomain\Jewelleries\Stones\TypeOrigins\Enums;

enum TypeOriginEnum: string
{
    case TYPE_RESOURCE = 'typeOrigins';
    case TABLE_NAME    = 'jw_stones.type_origins';
    case PRIMARY_KEY   = 'id';
}
