<?php

namespace JewelleryDomain\Jewellery\StoneExteriors\StoneCabochonForm\Enums;

enum StoneCabochonFormNamesEnum: string
{
    case OVAL_CABOCHON = 'круг кабошон';
    case ROUND_CABOCHON = 'овал кабошон';

    public function description(): string
    {
        return match ($this) {
            self::OVAL_CABOCHON  => 'Полированный камень овальной формы с куполообразным верхом и плоским дном овальной формы.',
            self::ROUND_CABOCHON => 'Полированный камень круглой формы с куполообразным верхом и плоским дном круглой формы.',
        };
    }
}
