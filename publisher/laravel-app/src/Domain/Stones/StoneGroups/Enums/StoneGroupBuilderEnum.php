<?php

namespace Domain\Stones\StoneGroups\Enums;

enum StoneGroupBuilderEnum: string
{
    case PRECIOUS             = 'драгоценные';
    case JEWELLERY            = 'ювелирные';
    case JEWELLERY_ORNAMENTAL = 'ювелирно-поделочные';
    case ORNAMENTAL           = 'поделочные';

    public function description(): string
    {
        return match ($this) {
            self::PRECIOUS             => 'Группа драгоценных камней по классификации профю Мельникова Е.П.',
            self::JEWELLERY            => 'Группа ювелирных камней по классификации профю Мельникова Е.П.',
            self::JEWELLERY_ORNAMENTAL => 'Группа ювелирно-поделочных камней по классификации профю Мельникова Е.П.',
            self::ORNAMENTAL           => 'Группа поделочных камней по классификации профю Мельникова Е.П.',
        };
    }
}
