<?php

namespace JewelleryDomain\Jewellery\InsertItems\StoneCut\Enums;

use JewelleryDomain\Jewellery\InsertItems\StoneForm\Enums\StoneFormNamesEnum;

enum StoneCutNamesEnum: string
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
                StoneFormNamesEnum::ROUND_CUT->value,
                StoneFormNamesEnum::PRINCESS_CUT->value,
                StoneFormNamesEnum::MARQUISE_CUT->value,
                StoneFormNamesEnum::OVAL_CUT->value,
                StoneFormNamesEnum::PEAR_CUT->value,
                StoneFormNamesEnum::CUSHION_CUT->value,
                StoneFormNamesEnum::HEART_CUT->value,
                StoneFormNamesEnum::TRILLION_CUT->value,
            ],
            self::STEP_CUT      => [
                StoneFormNamesEnum::EMERALD_CUT->value,
                StoneFormNamesEnum::ASSCHER_CUT->value,
                StoneFormNamesEnum::BAGUETTE_CUT->value,
            ],
            self::HYBRID        => [
                StoneFormNamesEnum::RADIANT_CUT->value,
            ],
            self::NATURAL       => [
                StoneFormNamesEnum::NATURAL->value
            ],
        };
    }
}
