<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Enums;

enum OpticalEffectNameRoutesEnum: string
{
    case CRUD_INDEX                            = 'optical-effects.index';
    case CRUD_SHOW                             = 'optical-effects.show';
    case CRUD_POST                             = 'optical-effects.post';
    case CRUD_PATCH                            = 'optical-effects.patch';
    case CRUD_DELETE                           = 'optical-effects.delete';
    case RELATED_TO_STONE_OPTICAL_EFFECTS      = 'optical-effect.stone-optical-effects';
    case RELATIONSHIP_TO_STONE_OPTICAL_EFFECTS = 'optical-effect.relationships.stone-optical-effects';
}
