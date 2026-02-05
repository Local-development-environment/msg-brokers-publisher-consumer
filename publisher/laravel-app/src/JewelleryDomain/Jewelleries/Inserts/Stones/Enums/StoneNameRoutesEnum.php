<?php

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Enums;

enum StoneNameRoutesEnum: string
{
    case CRUD_INDEX                           = 'stones.index';
    case CRUD_SHOW                            = 'stones.show';
    case CRUD_POST                            = 'stones.post';
    case CRUD_PATCH                           = 'stones.patch';
    case CRUD_DELETE                          = 'stones.delete';
    case RELATED_TO_STONE_TYPE_ORIGIN         = 'stones.stone-type-origin';
    case RELATIONSHIP_TO_STONE_TYPE_ORIGIN    = 'stones.relationships.stone-type-origin';
    case RELATED_TO_IMITATION_STONE           = 'stone.imitation-stone';
    case RELATIONSHIP_TO_IMITATION_STONE      = 'stone.relationships.imitation-stone';
    case RELATED_TO_GROWN_STONE               = 'stone.grown-stone';
    case RELATIONSHIP_TO_GROWN_STONE          = 'stone.relationships.grown-stone';
    case RELATED_TO_NATURAL_STONE             = 'stone.natural-stone';
    case RELATIONSHIP_TO_NATURAL_STONE        = 'stone.relationships.natural-stone';
    case RELATED_TO_FACETS                    = 'stones.stone-facets';
    case RELATIONSHIP_TO_FACETS               = 'stones.relationships.stone-facets';
    case RELATED_TO_STONE_COLOURS             = 'stones.stone-colours';
    case RELATIONSHIP_TO_STONE_COLOURS        = 'stones.relationships.stone-colours';
    case RELATED_TO_STONE_EXTERIORS           = 'stones.stone-exteriors';
    case RELATIONSHIP_TO_STONE_EXTERIORS      = 'stones.relationships.stone-exteriors';
    case RELATED_TO_STONE_OPTICAL_EFFECT      = 'stones.stone-optical-effect';
    case RELATIONSHIP_TO_STONE_OPTICAL_EFFECT = 'stones.relationships.stone-optical-effect';
}
