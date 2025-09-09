<?php

namespace Domain\Inserts\StoneFamilies\Enums;

enum StoneFamilyNameRoutesEnum: string
{
    case CRUD_INDEX                     = 'stone-families.index';
    case CRUD_SHOW                      = 'stone-families.show';
    case CRUD_POST                      = 'stone-families.post';
    case CRUD_PATCH                     = 'stone-families.patch';
    case CRUD_DELETE                    = 'stone-families.delete';
    case RELATED_TO_NATURAL_STONES      = 'stone-family.natural-stones';
    case RELATIONSHIP_TO_NATURAL_STONES = 'stone-family.relationships.natural-stones';
    case RELATED_TO_GROWN_STONES        = 'stone-family.grown-stones';
    case RELATIONSHIP_TO_GROWN_STONES   = 'stone-family.relationships.grown-stones';
}
