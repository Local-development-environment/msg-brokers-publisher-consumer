<?php

namespace Domain\Inserts\OptionalInfos\Enums;

enum OptionalInfoEnum: string
{
    case RESOURCE     = 'optionalInfos';
    case TABLE        = 'jw_inserts.optional_infos';
    case PRIMARY_KEY  = 'id';
    case FK_INSERT    = 'insert_id';
}
