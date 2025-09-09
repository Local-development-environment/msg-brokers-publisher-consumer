<?php

namespace Domain\Inserts\TypeOrigins\Enums;

enum TypeOriginEnum: string
{
    case RESOURCE = 'typeOrigins';
    case TABLE    = 'jw_inserts.type_origins';
    case PRIMARY_KEY   = 'jw_inserts.type_origins.id';
}
