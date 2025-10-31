<?php
declare(strict_types=1);

namespace Domain\Inserts\Colours\Enums;

enum ColourEnum: string
{
//    There are a few different colour entities (metal colour, insert colour) so in some cases we must use a clarifying
//    word - insert or metal before colour.

    case TYPE_RESOURCE = 'insertColours';
    case TABLE_NAME    = 'jw_inserts.colours';
    case PRIMARY_KEY   = 'id';
}
