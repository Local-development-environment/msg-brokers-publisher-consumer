<?php
declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Enums;

enum InsertExteriorRelationshipsEnum: string
{
    case STONE   = 'stone';
    case INSERTS = 'inserts';
    case FACET   = 'facet';
    case COLOUR  = 'insertColour';
}
