<?php

namespace Domain\Inserts\StoneGrades\Enums;

enum StoneGradeNameRoutesEnum: string
{
    case CRUD_INDEX                          = 'stone-grade.index';
    case CRUD_SHOW                           = 'stone-grade.show';
    case CRUD_POST                           = 'stone-grade.post';
    case CRUD_PATCH                          = 'stone-grade.patch';
    case CRUD_DELETE                         = 'stone-grade.delete';
    case RELATED_TO_NATURAL_STONE_GRADES     = 'stone-grade.natural-stone-grades';
    case RELATIONSHIP_TO_NATURAL_STONE_GRADES = 'stone-grade.relationships.natural-stone-grades';
}
