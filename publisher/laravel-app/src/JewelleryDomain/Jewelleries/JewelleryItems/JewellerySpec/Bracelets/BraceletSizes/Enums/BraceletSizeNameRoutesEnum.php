<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Enums;

enum BraceletSizeNameRoutesEnum: string
{
    case CRUD_INDEX                       = 'bracelet-sizes.index';
    case CRUD_SHOW                        = 'bracelet-sizes.show';
    case CRUD_POST                        = 'bracelet-sizes.post';
    case CRUD_PATCH                       = 'bracelet-sizes.patch';
    case CRUD_DELETE                      = 'bracelet-sizes.delete';
    case RELATED_TO_BRACELETS             = 'bracelet-sizes.bracelets';
    case RELATIONSHIP_TO_BRACELETS        = 'bracelet-sizes.relationships.bracelets';
    case RELATED_TO_BRACELET_METRICS      = 'bracelet-size.bracelet-metrics';
    case RELATIONSHIP_TO_BRACELET_METRICS = 'bracelet-size.relationships.bracelet-metrics';
}
