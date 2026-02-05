<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainWeavings\Enums;

enum ChainWeavingEnum: string
{
    case TYPE_RESOURCE = 'chainWeaving';
    case TABLE_NAME    = 'jw_properties.chain_weavings';
    case PRIMARY_KEY   = 'id';
    case FK_CLASP      = 'clasp_id';
}
