<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\Bracelets\Enums;

enum BraceletNameRoutesEnum: string
{
    case CRUD_INDEX                        = 'bracelets.index';
    case CRUD_SHOW                         = 'bracelets.show';
    case CRUD_POST                         = 'bracelets.post';
    case CRUD_PATCH                        = 'bracelets.patch';
    case CRUD_DELETE                       = 'bracelets.delete';
    case RELATED_TO_JEWELLERY              = 'bracelet.jewellery';
    case RELATIONSHIP_TO_JEWELLERY         = 'bracelet.relationships.jewellery';
    case RELATED_TO_BODY_PART              = 'bracelets.body-part';
    case RELATIONSHIP_TO_BODY_PART         = 'bracelets.relationships.body-part';
    case RELATED_TO_BRACELET_TYPE          = 'bracelets.bracelet-type';
    case RELATIONSHIP_TO_BRACELET_TYPE     = 'bracelets.relationships.bracelet-type';
    case RELATED_TO_CLASP                  = 'bracelets.clasp';
    case RELATIONSHIP_TO_CLASP             = 'bracelets.relationships.clasp';
    case RELATED_TO_BRACELET_WEAVINGS      = 'bracelet.bracelet-weavings';
    case RELATIONSHIP_TO_BRACELET_WEAVINGS = 'bracelet.relationships.bracelet-weavings';
    case RELATED_TO_BRACELET_METRICS       = 'bracelet.bracelet-metrics';
    case RELATIONSHIP_TO_BRACELET_METRICS  = 'bracelet.relationships.bracelet-metrics';
    case RELATED_TO_BRACELET_SIZES         = 'bracelets.bracelet-sizes';
    case RELATIONSHIP_TO_BRACELET_SIZES    = 'bracelets.relationships.bracelet-sizes';
    case RELATED_TO_WEAVINGS               = 'bracelets.weavings';
    case RELATIONSHIP_TO_WEAVINGS          = 'bracelets.relationships.weavings';
}
