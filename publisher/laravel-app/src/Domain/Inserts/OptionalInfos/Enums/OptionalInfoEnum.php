<?php

namespace Domain\Inserts\OptionalInfos\Enums;

enum OptionalInfoEnum: string
{
    case TYPE_RESOURCE     = 'optionalInfos';
    case TABLE_NAME        = 'jw_inserts.optional_infos';
    case PRIMARY_KEY  = 'id';
    case FK_INSERT    = 'insert_id';
}
