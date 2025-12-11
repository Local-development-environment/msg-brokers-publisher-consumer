<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\CharmPendants\CharmPendants\Enums;

enum CharmPendantEnum: string
{
    case TYPE_RESOURCE = 'charmPendants';
    case TABLE_NAME    = 'jw_properties.charm_pendants';
    case PRIMARY_KEY   = 'id';
}
