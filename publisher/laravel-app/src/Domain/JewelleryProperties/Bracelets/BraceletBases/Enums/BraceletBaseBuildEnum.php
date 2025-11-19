<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletBases\Enums;

enum BraceletBaseBuildEnum: string
{
    case METAL_CHAIN       = 'цепная основа';
    case METAL_MONOLITH    = 'цельный металл';
    case MONO_THREAD       = 'леска';
    case JEWELLERY_CABLE   = 'ювелирный тросик';
    case WAXED_CORD        = 'вощеный шнур';
    case MEMORY_WIRE       = 'мемори-проволока';
    case METAL_WIRE        = 'металлическая проволока';
    case SEGMENTAL_ITEMS   = 'сегментальная';
    case ELASTIC_THREAD    = 'спандекс';
    case LEATHER           = 'кожаная основа';

    public function description(): string
    {
        return match ($this) {
            self::METAL_CHAIN       => 'Металлическая основа в виде цепочки с разными типами плетения',
            self::METAL_MONOLITH    => 'Жесткая металлическая основа в виде замкнутого или разорванного обруча',
            self::MONO_THREAD       => 'Прозрачная леска, прочная и относительно недорогая основа.',
            self::JEWELLERY_CABLE   => 'Состоит из нескольких тонких проволок, скрученных вместе. Это прочная и гибкая основа, которая не перетирается.',
            self::WAXED_CORD        => 'Прочный и долговечный, придает изделию винтажный вид.',
            self::MEMORY_WIRE       => 'Проволока, сохраняющая форму, что идеально подходит для браслетов, которые не имеют застежки.',
            self::METAL_WIRE        => 'Для более жестких и структурированных украшений.',
            self::SEGMENTAL_ITEMS   => 'Сегментная основа собранная из соединительных элементов, пинов и колечек',
            self::ELASTIC_THREAD    => 'Эластичная основа, удобная для сборки браслетов, которые не имеют застежки.',
            self::LEATHER           => 'Кожаный браслет, с плетением или без',

        };
    }
}
