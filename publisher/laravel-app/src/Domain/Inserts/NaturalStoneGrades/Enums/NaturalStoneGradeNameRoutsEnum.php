<?php

namespace Domain\Inserts\NaturalStoneGrades\Enums;

enum NaturalStoneGradeNameRoutsEnum: string
{
    case CRUD_INDEX                          = 'natural-stone-grades.index';
    case CRUD_SHOW                           = 'natural-stone-grades.show';
    case CRUD_POST                           = 'natural-stone-grades.post';
    case CRUD_PATCH                          = 'natural-stone-grades.patch';
    case CRUD_DELETE                         = 'natural-stone-grades.delete';
    case RELATED_TO_NATURAL_STONE            = 'natural-stone-grade.natural-stone';
    case RELATIONSHIP_TO_NATURAL_STONE       = 'natural-stone-grade.relationships.natural-stone';
    case RELATED_TO_STONE_GRADE             = 'natural-stone-grades.stone-grade';
    case RELATIONSHIP_TO_STONE_GRADE        = 'natural-stone-grades.relationships.stone-grade';
}
