<?php

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingTypes\Enums;

use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\PiercingSites\Enums\PiercingSiteBuilderEnum;

enum PiercingTypeBuilderEnum: string
{
    case BARBELL  = 'штанга';
    case LABRET   = 'лабрет';
    case CLICKER  = 'кликер';
    case BANANA   = 'банан';
    case NOSTRIL  = 'нострил';
    case RINGS    = 'кольца';
    case SPIRAL   = 'спираль';
    case TWISTER  = 'твистер';
    case CIRCULAR = 'циркуляр';

    public function description(): string
    {
        return match ($this) {
            self::BARBELL  => 'Штанга - украшение для пирсинга, состоящее из прямого стержня и двух накруток на концах.',
            self::LABRET   => 'Лабрет - это украшение для пирсинга, состоящее из стержня с плоским диском с одной стороны и декоративной накруткой с другой. ',
            self::CLICKER  => 'Кликер - это украшение для пирсинга с защёлкивающимся механизмом закрывания, который может быть в виде прямой перекладины или продолжать форму окружности.',
            self::BANANA   => 'Банан - это украшение в виде изогнутого стержня с накрутками на концах (по форме напоминает банан, поэтому название серёжек неслучайно).',
            self::NOSTRIL  => 'Нострил - пирсинг в нос в виде загнутого крюка.',
            self::RINGS    => 'Кольца - украшения для пирсинга с круглым стержнем. Кольцо для пирсинга подходит для проколов ушей, носа, брови, губ, пупка, сосков. ',
            self::SPIRAL   => 'Такие украшения носятся в расширенных проколах мочек.',
            self::TWISTER  => 'Твистер - украшение для пирсинга в форме спирали с декоративными накрутками на концах. ',
            self::CIRCULAR => 'Циркуляр - украшение в виде неполного кольца или подковы с накрутками на концах (по форме напоминает полумесяц). ',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::BARBELL  => 10,
            self::LABRET   => 10,
            self::CLICKER  => 5,
            self::BANANA   => 15,
            self::NOSTRIL  => 10,
            self::RINGS    => 30,
            self::SPIRAL   => 5,
            self::TWISTER  => 5,
            self::CIRCULAR => 10,
        };
    }

    public function suitable(): array
    {
        return match ($this) {
            self::BARBELL,
            self::RINGS,
            self::CIRCULAR => [
                PiercingSiteBuilderEnum::NOSE->value,
                PiercingSiteBuilderEnum::NAVEL->value,
                PiercingSiteBuilderEnum::LIPS->value,
                PiercingSiteBuilderEnum::EARS->value,
                PiercingSiteBuilderEnum::BROWS->value,
            ],
            self::LABRET   => [
                PiercingSiteBuilderEnum::EARS->value,
                PiercingSiteBuilderEnum::NOSE->value,
                PiercingSiteBuilderEnum::LIPS->value,
            ],
            self::CLICKER,
            self::NOSTRIL  => [
                PiercingSiteBuilderEnum::NOSE->value,
            ],
            self::BANANA                => [
                PiercingSiteBuilderEnum::NAVEL->value,
                PiercingSiteBuilderEnum::NOSE->value,
                PiercingSiteBuilderEnum::BROWS->value,
            ],
            self::SPIRAL                => [
                PiercingSiteBuilderEnum::EARS->value,
            ],
            self::TWISTER               => [
                PiercingSiteBuilderEnum::NOSE->value,
                PiercingSiteBuilderEnum::NAVEL->value,
                PiercingSiteBuilderEnum::LIPS->value,
                PiercingSiteBuilderEnum::EARS->value,
            ],
        };
    }
}
