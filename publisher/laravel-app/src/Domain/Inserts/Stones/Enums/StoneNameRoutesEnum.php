<?php

namespace Domain\Inserts\Stones\Enums;

enum StoneNameRoutesEnum: string
{
    case CRUD_INDEX                          = 'stones.index';
    case CRUD_SHOW                           = 'stones.show';
    case CRUD_POST                           = 'stones.post';
    case CRUD_PATCH                          = 'stones.patch';
    case CRUD_DELETE                         = 'stones.delete';
    case RELATED_TO_STONE_TYPE_ORIGIN        = 'stones.stone-type-origin';
    case RELATIONSHIP_TO_STONE_TYPE_ORIGIN   = 'stones.relationships.stone-type-origin';
    case RELATED_TO_IMITATION_STONE          = 'stone.imitation-stone';
    case RELATIONSHIP_TO_IMITATION_STONE     = 'stone.relationships.imitation-stone';
    case RELATED_TO_GROWN_STONE              = 'stone.grown-stone';
    case RELATIONSHIP_TO_GROWN_STONE         = 'stone.relationships.grown-stone';
    case RELATED_TO_NATURAL_STONE            = 'stone.natural-stone';
    case RELATIONSHIP_TO_NATURAL_STONE       = 'stone.relationships.natural-stone';
}
