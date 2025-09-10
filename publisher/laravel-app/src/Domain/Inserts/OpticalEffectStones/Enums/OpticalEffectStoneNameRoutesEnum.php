<?php

namespace Domain\Inserts\OpticalEffectStones\Enums;

enum OpticalEffectStoneNameRoutesEnum: string
{
    case CRUD_INDEX                   = 'optical-effect-stones.index';
    case CRUD_SHOW                    = 'optical-effect-stones.show';
    case CRUD_POST                    = 'optical-effect-stones.post';
    case CRUD_PATCH                   = 'optical-effect-stones.patch';
    case CRUD_DELETE                  = 'optical-effect-stones.delete';
    case RELATED_TO_OPTICAL_EFFECT    = 'optical-effect-stones.optical-effect';
    case RELATIONSHIP_TO_OPTICAL_EFFECT = 'optical-effect-stones.relationships.optical-effect';
    case RELATED_TO_STONE             = 'optical-effect-stone.stone';
    case RELATIONSHIP_TO_STONE        = 'optical-effect-stone.relationships.stone';
}
