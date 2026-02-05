<?php

namespace JewelleryDomain\Jewelleries\Inserts\ImitationStones\Enums;

enum ImitationStoneNameRoutesEnum: string
{
    case CRUD_INDEX              = 'imitation-stones.index';
    case CRUD_SHOW               = 'imitation-stones.show';
    case CRUD_POST               = 'imitation-stones.post';
    case CRUD_PATCH              = 'imitation-stones.patch';
    case CRUD_DELETE             = 'imitation-stones.delete';
    case RELATED_TO_STONE        = 'imitation-stone.stone';
    case RELATIONSHIP_TO_STONE   = 'imitation-stone.relationships.stone';
}
