<?php

namespace JewelleryDomain\Jewellery\StoneExteriors\StoneTypeCut\Enums;

use JewelleryDomain\Jewellery\StoneExteriors\StoneCutForm\Enums\StoneCutFormNamesEnum;

enum StoneTypeCutNamesEnum: string
{
    case BRILLIANT_CUT = 'бриллиантовая огранка';
    case STEP_CUT      = 'ступенчатая огранка';
    case HYBRID        = 'гибридная огранка';
    case NATURAL       = 'природная огранка';

    public function description(): string
    {
        return match ($this) {
            self::BRILLIANT_CUT => 'Бриллиантовая огранка (обычно круглая КР-57) — это золотой стандарт обработки алмаза, включающий нанесение 57 плоских граней (фацетов) для максимального раскрытия игры света.',
            self::STEP_CUT      => 'Ступенчатая огранка — это тип фасетной обработки драгоценных камней, при котором грани (фасеты) располагаются параллельно рундисту (пояску камня) друг над другом, напоминая лестницу.',
            self::HYBRID        => 'Гибридная огранка — это сочетание различных техник обработки драгоценных камней, чаще всего объединяющее черты бриллиантовой (сцинтилляция) и ступенчатой (яркость, чистота) огранок.',
            self::NATURAL       => 'Естественная огранка, сделанная природой или другими словами отсутствие огранки',
        };
    }

    public function stoneForms(): array
    {
        return match ($this) {
            self::BRILLIANT_CUT => [
                StoneCutFormNamesEnum::ROUND_CUT->value,
                StoneCutFormNamesEnum::PRINCESS_CUT->value,
                StoneCutFormNamesEnum::MARQUISE_CUT->value,
                StoneCutFormNamesEnum::OVAL_CUT->value,
                StoneCutFormNamesEnum::PEAR_CUT->value,
                StoneCutFormNamesEnum::CUSHION_CUT->value,
                StoneCutFormNamesEnum::HEART_CUT->value,
                StoneCutFormNamesEnum::TRILLION_CUT->value,
            ],
            self::STEP_CUT      => [
                StoneCutFormNamesEnum::EMERALD_CUT->value,
                StoneCutFormNamesEnum::ASSCHER_CUT->value,
                StoneCutFormNamesEnum::BAGUETTE_CUT->value,
            ],
            self::HYBRID        => [
                StoneCutFormNamesEnum::RADIANT_CUT->value,
            ],
            self::NATURAL       => [
                StoneCutFormNamesEnum::NATURAL->value
            ],
        };
    }
}
