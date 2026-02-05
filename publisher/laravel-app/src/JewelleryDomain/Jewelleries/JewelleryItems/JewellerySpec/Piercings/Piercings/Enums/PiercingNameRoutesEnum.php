<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Enums;

enum PiercingNameRoutesEnum: string
{
    case CRUD_INDEX                = 'piercings.index';
    case CRUD_SHOW                 = 'piercings.show';
    case CRUD_POST                 = 'piercings.post';
    case CRUD_PATCH                = 'piercings.patch';
    case CRUD_DELETE               = 'piercings.delete';
    case RELATED_TO_JEWELLERY      = 'piercing.jewellery';
    case RELATIONSHIP_TO_JEWELLERY = 'piercing.relationships.jewellery';
}
