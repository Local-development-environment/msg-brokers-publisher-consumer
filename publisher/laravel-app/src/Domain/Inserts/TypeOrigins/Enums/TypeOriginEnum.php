<?php

namespace Domain\Inserts\TypeOrigins\Enums;

enum TypeOriginEnum: string
{
    case TYPE_RESOURCE = 'typeOrigins';
    case TABLE_NAME    = 'jw_inserts.type_origins';
    case PRIMARY_KEY   = 'jw_inserts.type_origins.id';
}
