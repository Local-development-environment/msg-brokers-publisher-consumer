<?php

namespace Domain\Inserts\OpticalEffects\Enums;

enum OpticalEffectNameRoutesEnum: string
{
    case CRUD_INDEX                          = 'optical-effects.index';
    case CRUD_SHOW                           = 'optical-effects.show';
    case CRUD_POST                           = 'optical-effects.post';
    case CRUD_PATCH                          = 'optical-effects.patch';
    case CRUD_DELETE                         = 'optical-effects.delete';
    case RELATED_TO_OPTICAL_EFFECT_STONES    = 'optical-effect.optical-effect-stones';
    case RELATIONSHIP_TO_OPTICAL_EFFECT_STONES = 'optical-effect.relationships.optical-effect-stones';
}
