<?php

namespace Domain\JewelleryProperties\CuffLinks\CuffLinkTypes\Enums;

enum CuffLinkTypeEnum: string
{
    case TYPE_RESOURCE = 'cuffLinkTypes';
    case TABLE_NAME    = 'jw_properties.cuff_link_types';
    case PRIMARY_KEY   = 'id';
}
