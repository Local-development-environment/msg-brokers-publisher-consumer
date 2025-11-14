<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringTypes\Enums;

enum CoveringTypeRelationshipsEnum: string
{
    case COVERING_FUNCTION = 'coveringFunction';
    case COVERINGS = 'coverings';
    case COVERING_SHADES = 'coveringShades';
}
