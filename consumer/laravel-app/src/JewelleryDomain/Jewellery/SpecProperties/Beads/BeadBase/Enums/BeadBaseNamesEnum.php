<?php

namespace JewelleryDomain\Jewellery\SpecProperties\Beads\BeadBase\Enums;

enum BeadBaseNamesEnum: string
{
    case NYLON_THREAD      = 'нейлоновая нить';
    case SILK_THREAD       = 'шелковая нить';
    case REINFORCED_THREAD = 'армированная нить';
    case MEMORY_WIRE       = 'мемори-проволока';
    case METAL_WIRE        = 'металлическая проволока';
    case ELASTIC_THREAD    = 'спандекс';
    case MONO_THREAD       = 'леска';
    case JEWELLERY_CABLE   = 'ювелирный тросик';
    case WAXED_CORD        = 'вощеный шнур';
    case TEXTILE_CORD      = 'текстильный шнур';
    case LEATHER_CORD      = 'кожаный шнур';

    public function description(): string
    {
        return match ($this) {
            self::NYLON_THREAD      => 'Прочная и износостойкая нить из нейлона.',
            self::SILK_THREAD       => 'Традиционный выбор, особенно для бусин из натуральных камней.',
            self::REINFORCED_THREAD => 'Прочная нить с дополнительным армированием.',
            self::MEMORY_WIRE       => 'Проволока, сохраняющая форму, что идеально подходит для браслетов и колье, которые не имеют застежки.',
            self::METAL_WIRE        => 'Для более жестких и структурированных украшений.',
            self::ELASTIC_THREAD    => 'Эластичная основа, удобная для сборки браслетов, которые не имеют застежки.',
            self::MONO_THREAD       => 'Прозрачная, прочная и относительно недорогая основа.',
            self::JEWELLERY_CABLE   => 'Состоит из нескольких тонких проволок, скрученных вместе. Это прочная и гибкая основа, которая не перетирается.',
            self::WAXED_CORD        => 'Прочный и долговечный, придает изделию винтажный вид.',
            self::LEATHER_CORD      => 'Идеален для этнических и бохо-стилей.',
            self::TEXTILE_CORD      => 'Бывает разным по толщине, цвету и материалу (хлопок, полиэстер).',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::NYLON_THREAD      => 20,
            self::SILK_THREAD       => 20,
            self::REINFORCED_THREAD => 0,
            self::MEMORY_WIRE       => 0,
            self::METAL_WIRE        => 0,
            self::ELASTIC_THREAD    => 0,
            self::MONO_THREAD       => 20,
            self::JEWELLERY_CABLE   => 20,
            self::WAXED_CORD        => 20,
            self::TEXTILE_CORD      => 0,
            self::LEATHER_CORD      => 0,

        };
    }
}
