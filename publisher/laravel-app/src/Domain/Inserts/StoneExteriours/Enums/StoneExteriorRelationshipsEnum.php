<?php
declare(strict_types=1);

namespace Domain\Inserts\StoneExteriours\Enums;

enum StoneExteriorRelationshipsEnum: string
{
    case STONE   = 'stone';
    case INSERTS = 'inserts';
    case FACET   = 'facet';
    case COLOUR  = 'insertColour';
}
