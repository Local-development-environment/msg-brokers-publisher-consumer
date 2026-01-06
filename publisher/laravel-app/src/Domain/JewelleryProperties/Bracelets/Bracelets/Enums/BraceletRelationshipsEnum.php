<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\Bracelets\Enums;

enum BraceletRelationshipsEnum: string
{
    case BRACELET_BASE     = 'braceletBase';
    case BRACELET_METRICS  = 'braceletMetrics';
    case JEWELLERY         = 'jewellery';
    case CLASP             = 'clasp';
    case BRACELET_WEAVINGS = 'braceletWeavings';
    case BODY_PART         = 'bodyPart';
    case BRACELET_SIZES    = 'braceletSizes';
    case WEAVINGS          = 'weavings';
}
