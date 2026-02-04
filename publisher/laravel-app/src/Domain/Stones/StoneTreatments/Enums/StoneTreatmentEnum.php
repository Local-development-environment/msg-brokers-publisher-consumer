<?php

namespace Domain\Stones\StoneTreatments\Enums;

enum StoneTreatmentEnum: string
{
    case TYPE_RESOURCE = 'stoneTreatments';
    case TABLE_NAME    = 'jw_inserts.stone_treatments';
    case PRIMARY_KEY   = 'id';
}
