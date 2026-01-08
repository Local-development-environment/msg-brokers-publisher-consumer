<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneItemGrades\Enums;

enum StoneItemGradeNameRoutesEnum: string
{
    case CRUD_INDEX                  = 'stone-item-grades.index';
    case CRUD_SHOW                   = 'stone-item-grades.show';
    case CRUD_POST                   = 'stone-item-grades.post';
    case CRUD_PATCH                  = 'stone-item-grades.patch';
    case CRUD_DELETE                 = 'stone-item-grades.delete';
    case RELATED_TO_STONE_GRADE      = 'stone-item-grades.stone-grade';
    case RELATIONSHIP_TO_STONE_GRADE = 'stone-item-grades.relationships.stone-grade';
    case RELATED_TO_GROUP_GRADE      = 'stone-item-grades.group-grade';
    case RELATIONSHIP_TO_GROUP_GRADE = 'stone-item-grades.relationships.group-grade';
}
