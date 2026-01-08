<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\LengthNames\Enums;

enum LengthNameNameRoutesEnum: string
{
    case CRUD_INDEX                 = 'length-names.index';
    case CRUD_SHOW                  = 'length-names.show';
    case CRUD_POST                  = 'length-names.post';
    case CRUD_PATCH                 = 'length-names.patch';
    case CRUD_DELETE                = 'length-names.delete';
    case RELATED_TO_NECK_SIZES      = 'length-name.neck-sizes';
    case RELATIONSHIP_TO_NECK_SIZES = 'length-name.relationships.neck-sizes';
}
