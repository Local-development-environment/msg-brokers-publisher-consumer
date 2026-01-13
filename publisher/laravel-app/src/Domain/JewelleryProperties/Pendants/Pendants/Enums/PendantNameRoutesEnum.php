<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Pendants\Pendants\Enums;

enum PendantNameRoutesEnum: string
{
    case CRUD_INDEX                = 'pendants.index';
    case CRUD_SHOW                 = 'pendants.show';
    case CRUD_POST                 = 'pendants.post';
    case CRUD_PATCH                = 'pendants.patch';
    case CRUD_DELETE               = 'pendants.delete';
    case RELATED_TO_JEWELLERY      = 'pendant.jewellery';
    case RELATIONSHIP_TO_JEWELLERY = 'pendant.relationships.jewellery';
}
