<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\SpecProperties\Piercings\PiercingSite\Enums;

enum PiercingSiteNamesEnum: string
{
    case NAVEL = 'пупок';
    case NOSE  = 'нос';
    case LIPS  = 'губы';
    case BROWS = 'брови';
    case EARS  = 'уши';

    public function description(): string
    {
        return match ($this) {
            self::NAVEL => 'Пирсинг пупка – это прокол кожи с установкой украшения в эстетических целях. Обычно делается в верхней складке пупка.',
            self::NOSE  => 'Пирсинг носа — это популярный вид модификации лица, заключающийся в проколе мягких тканей или хрящей носа для ношения украшений.',
            self::LIPS  => 'Пирсинг губы — это популярный вид модификации тела, заключающийся в проколе мягких тканей (губ или кожи вокруг них) для ношения украшений.',
            self::BROWS => 'Пирсинг брови — разновидность пирсинга лица, при котором в области брови создается прокол с целью установки и ношения украшения.',
            self::EARS  => 'Пиирсинг уха (прокол уха)— создание прокола в той или иной части наружного уха с целью введения и ношения украшения.',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::NAVEL => 10,
            self::NOSE  => 30,
            self::LIPS  => 20,
            self::BROWS => 10,
            self::EARS  => 30,
        };
    }
}
