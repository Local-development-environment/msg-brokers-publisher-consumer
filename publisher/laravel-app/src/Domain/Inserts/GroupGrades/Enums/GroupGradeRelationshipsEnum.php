<?php
declare(strict_types=1);

namespace Domain\Inserts\GroupGrades\Enums;

enum GroupGradeRelationshipsEnum: string
{
    case NATURAL_STONE = 'naturalStone';
    case STONE_GRADE   = 'stoneGrade';
    case STONE_GROUP   = 'stoneGroup';
}
