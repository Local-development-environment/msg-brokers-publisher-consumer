<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneOpticalEffects\Enums;

enum StoneOpticalEffectNameRoutesEnum: string
{
    case CRUD_INDEX                     = 'stone-optical-effects.index';
    case CRUD_SHOW                      = 'stone-optical-effects.show';
    case CRUD_POST                      = 'stone-optical-effects.post';
    case CRUD_PATCH                     = 'stone-optical-effects.patch';
    case CRUD_DELETE                    = 'stone-optical-effects.delete';
    case RELATED_TO_OPTICAL_EFFECT      = 'stone-optical-effects.optical-effect';
    case RELATIONSHIP_TO_OPTICAL_EFFECT = 'stone-optical-effects.relationships.optical-effect';
    case RELATED_TO_STONE               = 'stone-optical-effect.stone';
    case RELATIONSHIP_TO_STONE          = 'stone-optical-effect.relationships.stone';
}
