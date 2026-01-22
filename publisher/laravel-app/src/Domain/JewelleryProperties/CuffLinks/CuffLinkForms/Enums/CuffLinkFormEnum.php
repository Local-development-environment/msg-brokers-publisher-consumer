<?php

namespace Domain\JewelleryProperties\CuffLinks\CuffLinkForms\Enums;

enum CuffLinkFormEnum: string
{
    case TYPE_RESOURCE = 'cuffLinkForms';
    case TABLE_NAME    = 'jw_properties.cuff_link_forms';
    case PRIMARY_KEY   = 'id';
}
