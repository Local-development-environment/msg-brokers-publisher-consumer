<?php

namespace Domain\Inserts\StoneColours\Enums;

enum StoneColourNameRoutesEnum: string
{
    case CRUD_INDEX              = 'stone-colours.index';
    case CRUD_SHOW               = 'stone-colours.show';
    case CRUD_POST               = 'stone-colours.post';
    case CRUD_PATCH              = 'stone-colours.patch';
    case CRUD_DELETE             = 'stone-colours.delete';
    case RELATED_TO_INSERT_STONES        = 'stone-colour.insert-stones';
    case RELATIONSHIP_TO_INSERT_STONES   = 'stone-colour.relationships.insert-stones';
}
