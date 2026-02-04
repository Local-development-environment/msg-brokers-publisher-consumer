<?php

namespace Domain\BeadItems\BeadTypeCuts;

enum BeadTypeCutBuilderEnum: string
{
    case NONSTANDARD = 'нестандартная';

    public function description(): string
    {
        return match ($this) {
            self::NONSTANDARD => 'огранка произвольного вида, в некоторой степени определенная формой бусины',
        };
    }
}
