<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinks\Enums;

enum CuffLinkEnum: string
{
    case TYPE_RESOURCE = 'cuffLinks';
    case TABLE_NAME    = 'jw_properties.cuff_links';
    case PRIMARY_KEY   = 'id';
    case FK_CUFF_LINK_CLASP_ID = 'cuff_link_clasps.id';
    case FK_CUFF_LINK_FORM_ID = 'cuff_link_forms.id';
    case FK_CUFF_LINK_TYPE_ID = 'cuff_link_types.id';
}
