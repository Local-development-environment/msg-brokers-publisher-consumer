<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Brooches\Brooches\Enums;

enum BroochNameRoutesEnum: string
{
    case CRUD_INDEX                = 'brooches.index';
    case CRUD_SHOW                 = 'brooches.show';
    case CRUD_POST                 = 'brooches.post';
    case CRUD_PATCH                = 'brooches.patch';
    case CRUD_DELETE               = 'brooches.delete';
    case RELATED_TO_JEWELLERY      = 'brooches.jewellery';
    case RELATIONSHIP_TO_JEWELLERY = 'brooches.relationships.jewellery';
}
