<?php
declare(strict_types=1);

namespace Domain\Inserts\Inserts\Enums;

enum InsertEnum: string
{
    case TYPE_RESOURCE = 'inserts';
    case TABLE_NAME    = 'jw_inserts.inserts';
    case PRIMARY_KEY   = 'id';
}
