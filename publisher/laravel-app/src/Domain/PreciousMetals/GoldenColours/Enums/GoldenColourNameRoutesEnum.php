<?php

declare(strict_types=1);

namespace Domain\PreciousMetals\GoldenColours\Enums;

enum GoldenColourNameRoutesEnum: string
{
    case CRUD_INDEX  = 'golden-colours.index';
    case CRUD_SHOW   = 'golden-colours.show';
    case CRUD_POST   = 'golden-colours.post';
    case CRUD_PATCH  = 'golden-colours.patch';
    case CRUD_DELETE = 'golden-colours.delete';
    case RELATED_TO_COLOUR_COMBINATIONS      = 'golden-colour.colour-combinations';
    case RELATIONSHIP_TO_COLOUR_COMBINATIONS = 'golden-colours.relationships.colour-combinations';
    case RELATED_TO_METALS                   = 'golden-colours.metals';
    case RELATIONSHIP_TO_METALS              = 'golden-colours.relationships.metals';
}
