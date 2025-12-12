<?php

namespace Domain\Inserts\NaturalStones\Enums;

enum NatureStoneNameRoutesEnum: string
{
    case CRUD_INDEX                          = 'natural-stones.index';
    case CRUD_SHOW                           = 'natural-stones.show';
    case CRUD_POST                           = 'natural-stones.post';
    case CRUD_PATCH                          = 'natural-stones.patch';
    case CRUD_DELETE                         = 'natural-stones.delete';
    case RELATED_TO_STONE                    = 'natural-stone.stone';
    case RELATIONSHIP_TO_STONE               = 'natural-stone.relationships.stone';
    case RELATED_TO_STONE_GROUP              = 'natural-stones.stone-group';
    case RELATIONSHIP_TO_STONE_GROUP         = 'natural-stones.relationships.stone-group';
    case RELATED_TO_STONE_FAMILY             = 'natural-stones.stone-family';
    case RELATIONSHIP_TO_STONE_FAMILY        = 'natural-stones.relationships.stone-family';
    case RELATED_TO_NATURAL_STONE_GRADE      = 'natural-stone.natural-stone-grade';
    case RELATIONSHIP_TO_NATURAL_STONE_GRADE = 'natural-stone.relationships.natural-stone-grade';
}
