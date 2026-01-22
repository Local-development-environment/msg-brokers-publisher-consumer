<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\SpecProperties\Brooches\BroochClasp\Enums;

enum BroochClaspNameEnum: string
{
    case PIN      = 'булавка';
    case NEEDLE   = 'игла';
    case SCREW    = 'винт';
    case BARRETTE = 'заколка';
    case CLIP     = 'клипса';
    case BARBELL  = 'штанга';
    case MAGNET   = 'магнит';

    public function description(): string
    {
        return match ($this) {
            self::PIN      => 'самый распространенный вариант для ювелирных и большинства бижутерных брошей – английская булавка.',
            self::NEEDLE   => 'Крепление такого типа имеет простейшую конструкцию: по сути, это как портновская булавка, но с декоративной головкой.',
            self::SCREW    => 'Не слишком распространенный вариант: на основе броши имеется винт с резьбой, которым протыкают одежду. Для фиксации используется декоративная гайка.',
            self::BARRETTE => 'Тип крепления – заурядный подпружиненный зажим.',
            self::CLIP     => 'С тыльной стороны такая брошь закрепляется зажимной клипсой, накрепко фиксирующей ее на одежде.',
            self::BARBELL  => 'Достаточно редкое крепление броши – штанга. Она фиксируется на одежде с помощью миниатюрных навинчивающихся шариков и их всевозможных модификаций.',
            self::MAGNET   => 'Очень удобный, но весьма ненадежный вариант.',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::PIN      => 10,
            self::NEEDLE   => 20,
            self::SCREW    => 10,
            self::BARRETTE => 10,
            self::CLIP     => 20,
            self::BARBELL  => 20,
            self::MAGNET   => 10,
        };
    }
}
