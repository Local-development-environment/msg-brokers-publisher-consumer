<?php

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkForms\Enums;

enum CuffLinkFormBuilderEnum: string
{
    case ROUND   = 'круг';
    case OVAL    = 'овал';
    case SQUARE  = 'квадрат';
    case FANTASY = 'фантазийная';

    public function description(): string
    {
        return match ($this) {
            self::ROUND   => 'Круглая форма является классической и весьма распространенной',
            self::SQUARE  => 'Квадратная форма является классической и весьма распространенной',
            self::OVAL    => 'Овальная форма является классической и весьма распространенной',
            self::FANTASY => 'Фантазийная форма может быть тематической или выражать фантазию.',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::ROUND   => 30,
            self::SQUARE  => 30,
            self::OVAL    => 30,
            self::FANTASY => 10,
        };
    }
}
