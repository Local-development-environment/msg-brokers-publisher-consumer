<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\CharmPendants\CharmPendants\Enums;

enum CharmPendantNameRoutesEnum: string
{
    case CRUD_INDEX                = 'charm-pendants.index';
    case CRUD_SHOW                 = 'charm-pendants.show';
    case CRUD_POST                 = 'charm-pendants.post';
    case CRUD_PATCH                = 'charm-pendants.patch';
    case CRUD_DELETE               = 'charm-pendants.delete';
    case RELATED_TO_JEWELLERY      = 'charm-pendant.jewellery';
    case RELATIONSHIP_TO_JEWELLERY = 'charm-pendant.relationships.jewellery';
}
