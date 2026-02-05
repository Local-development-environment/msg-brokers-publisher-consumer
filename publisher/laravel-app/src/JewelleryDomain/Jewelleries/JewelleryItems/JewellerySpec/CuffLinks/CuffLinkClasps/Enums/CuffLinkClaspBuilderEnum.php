<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CuffLinks\CuffLinkClasps\Enums;

enum CuffLinkClaspBuilderEnum: string
{
    case TOGGLE     = 'шарнирный';
    case STUD       = 'штифтовый';
    case CLIP       = 'клипса';
    case CHAIN_LINK = 'цепочный';

    public function description(): string
    {
        return match ($this) {
            self::TOGGLE     => 'Самые популярные и удобные. Имеют поворотный T-образный штырек, который фиксирует манжету',
            self::STUD       => 'Фиксируются штифтом, продеваемым через манжету, часто минималистичны.',
            self::CLIP       => 'Крепятся зажимом, не требуя дополнительных отверстий.',
            self::CHAIN_LINK => 'Классический вариант с двумя дисками, соединенными цепочкой, придающей винтажный вид.',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::TOGGLE     => 50,
            self::STUD       => 10,
            self::CLIP       => 30,
            self::CHAIN_LINK => 10,
        };
    }
}
