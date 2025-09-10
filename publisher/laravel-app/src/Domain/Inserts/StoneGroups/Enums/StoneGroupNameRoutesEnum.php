<?php

namespace Domain\Inserts\StoneGroups\Enums;

enum StoneGroupNameRoutesEnum: string
{
    case CRUD_INDEX                     = 'stone-groups.index';
    case CRUD_SHOW                      = 'stone-groups.show';
    case CRUD_POST                      = 'stone-groups.post';
    case CRUD_PATCH                     = 'stone-groups.patch';
    case CRUD_DELETE                    = 'stone-groups.delete';
    case RELATED_TO_NATURAL_STONES      = 'stone-group.natural-stones';
    case RELATIONSHIP_TO_NATURAL_STONES = 'stone-group.relationships.natural-stones';
}
