<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\SpecProperties\CuffLinks\CuffLinkType\Enums;

enum CuffLinkTypeNameEnum: string
{
    case SYMMETRIC    = 'симметричные';
    case DISSYMMETRIC = 'несимметричные';

    public function description(): string
    {
        return match ($this) {
            self::SYMMETRIC    => 'Украшены с обеих сторон, практичны и универсальны.',
            self::DISSYMMETRIC => '(Односторонние): Лицевая сторона декоративная, задняя – застежка, стоят дешевле, но менее популярны.',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::SYMMETRIC    => 70,
            self::DISSYMMETRIC => 30,
        };
    }
}
