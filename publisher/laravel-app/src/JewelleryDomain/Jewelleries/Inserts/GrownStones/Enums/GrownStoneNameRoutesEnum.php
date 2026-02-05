<?php

namespace JewelleryDomain\Jewelleries\Inserts\GrownStones\Enums;

enum GrownStoneNameRoutesEnum: string
{
    case CRUD_INDEX                          = 'grown-stones.index';
    case CRUD_SHOW                           = 'grown-stones.show';
    case CRUD_POST                           = 'grown-stones.post';
    case CRUD_PATCH                          = 'grown-stones.patch';
    case CRUD_DELETE                         = 'grown-stones.delete';
    case RELATED_TO_STONE                    = 'grown-stone.stone';
    case RELATIONSHIP_TO_STONE               = 'grown-stone.relationships.stone';
    case RELATED_TO_STONE_FAMILY             = 'grown-stones.stone-family';
    case RELATIONSHIP_TO_STONE_FAMILY        = 'grown-stones.relationships.stone-family';
}
