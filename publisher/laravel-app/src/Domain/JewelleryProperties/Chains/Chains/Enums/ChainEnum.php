<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Chains\Chains\Enums;

enum ChainEnum: string
{
    case TYPE_RESOURCE = 'chains';
    case TABLE_NAME = 'jw_properties.chains';
    case PRIMARY_KEY   = 'id';
    case FK_CLASP     = 'clasp_id';
}
