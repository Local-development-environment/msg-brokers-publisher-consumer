<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\InsertItems\InsertOptionalInfo\Enums;

enum InsertOptionalInfoEnum: string
{
    case TYPE_RESOURCE = 'insertOptionalInfos';
    case TABLE_NAME    = 'jw_inserts.insert_optional_infos';
    case PRIMARY_KEY   = 'id';
}
