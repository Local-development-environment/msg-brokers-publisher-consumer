<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Enums;

enum BroochNameRoutesEnum: string
{
    case CRUD_INDEX                = 'brooches.index';
    case CRUD_SHOW                 = 'brooches.show';
    case CRUD_POST                 = 'brooches.post';
    case CRUD_PATCH                = 'brooches.patch';
    case CRUD_DELETE               = 'brooches.delete';
    case RELATED_TO_JEWELLERY      = 'brooch.jewellery';
    case RELATIONSHIP_TO_JEWELLERY = 'brooch.relationships.jewellery';
}
