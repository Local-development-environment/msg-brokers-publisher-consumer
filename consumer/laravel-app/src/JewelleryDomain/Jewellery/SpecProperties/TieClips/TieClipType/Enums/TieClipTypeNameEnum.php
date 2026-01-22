<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\SpecProperties\TieClips\TieClipType\Enums;

enum TieClipTypeNameEnum: string
{
    case CLOTHESPIN = 'прищепка';
    case FLAT       = 'плоская';
    case WITH_CHAIN = 'с цепочкой';
    case CLIP       = 'клипса';

    public function description(): string
    {
        return match ($this) {
            self::CLOTHESPIN => 'Имеет зубцы для надежной фиксации и лучше подходит для плотных галстуков.',
            self::FLAT       => 'Две пластины, удерживающие галстук давлением; для тонких галстуков.',
            self::WITH_CHAIN => 'Классический ретро-вариант с дополнительной цепочкой для крепления к пуговице рубашки. ',
            self::CLIP       => 'Металлическая пластина с пружиной, самый популярный и универсальный вид, подходит для тонких тканей.',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::CLOTHESPIN => 40,
            self::FLAT       => 10,
            self::WITH_CHAIN => 20,
            self::CLIP       => 30,
        };
    }
}
