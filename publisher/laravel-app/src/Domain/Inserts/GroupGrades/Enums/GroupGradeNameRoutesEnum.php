<?php
declare(strict_types=1);

namespace Domain\Inserts\GroupGrades\Enums;

enum GroupGradeNameRoutesEnum: string
{
    case CRUD_INDEX                       = 'group-grades.index';
    case CRUD_SHOW                        = 'group-grades.show';
    case CRUD_POST                        = 'group-grades.post';
    case CRUD_PATCH                       = 'group-grades.patch';
    case CRUD_DELETE                      = 'group-grades.delete';
    case RELATED_TO_NATURAL_STONE         = 'group-grade.natural-stone';
    case RELATIONSHIP_TO_NATURAL_STONE    = 'group-grade.relationships.natural-stone';
    case RELATED_TO_STONE_ITEM_GRADE      = 'group-grades.stone-item-grade';
    case RELATIONSHIP_TO_STONE_ITEM_GRADE = 'group-grades.relationships.stone-item-grade';
    case RELATED_TO_STONE_GROUP           = 'group-grades.stone-group';
    case RELATIONSHIP_TO_STONE_GROUP      = 'group-grades.relationships.stone-group';
}
