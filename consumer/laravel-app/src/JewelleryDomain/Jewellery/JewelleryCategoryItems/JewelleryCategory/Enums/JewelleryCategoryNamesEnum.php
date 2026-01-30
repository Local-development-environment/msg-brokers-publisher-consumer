<?php

namespace JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums;

use JewelleryDomain\Jewellery\InsertItems\Stone\Enums\StoneNamesEnum;

enum JewelleryCategoryNamesEnum: string
{
    case BEADS          = 'бусы';
    case BRACELETS      = 'браслеты';
    case BROOCHES       = 'броши';
    case CHAINS         = 'цепи';
    case CHARM_PENDANTS = 'подвески-шарм';
    case CUFF_LINKS     = 'запонки';
    case EARRINGS       = 'серьги';
    case NECKLACES      = 'колье';
    case PENDANTS       = 'подвески';
    case PIERCINGS      = 'пирсинг';
    case RINGS          = 'кольца';
    case TIE_CLIPS      = 'зажимы для галстука';

    public function description(): string
    {
        return match ($this) {
            self::BEADS          => 'Бусы это украшение из нанизанных на нитку или леску бусин (округлых или другой формы предметов), которое обычно носят на шее',
            self::BRACELETS      => 'Браслет ювелирное украшение, надеваемое на руку',
            self::BROOCHES       => 'Брошь это ювелирное изделие, которое прикалывается к одежде или другим аксессуарам с помощью специальной застежки или булавки',
            self::CHAINS         => 'Цепь это декоративное ювелирное изделие, представляющее собой гибкую цепочку из соединенных звеньев, которое носят на шее',
            self::CHARM_PENDANTS => 'Подвеска-шарм это небольшая декоративная подвеска, которую можно носить на браслете, цепочке или серьгах.',
            self::CUFF_LINKS     => 'Запонка это декоративная застёжка для мужской рубашки, которая используется для скрепления манжет вместо пуговиц',
            self::EARRINGS       => 'Серьга это украшение, которое носят на мочке уха',
            self::NECKLACES      => 'Цельное украшение для шеи, которое часто имеет более короткую длину и плотно облегает шею, подчеркивая зону декольте. Украшение с центральным элементом, где сама цепочка является продолжением дизайна, а не просто основой',
            self::PENDANTS       => 'Куло́н ювелирное украшение, надеваемое на шею. Разновидность подвески.',
            self::PIERCINGS      => 'Пирсинг это украшение, которое носят в проколе тела.',
            self::RINGS          => 'Кольцо это украшение в виде ободка или круга из металла или другого материала, которое надевают на палец',
            self::TIE_CLIPS      => 'Зажим для галстука это мужской аксессуар в виде клипсы, предназначенный для крепления галстука к передней части рубашки'
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::BEADS,
            self::NECKLACES,
            self::BROOCHES,
            self::CHARM_PENDANTS,
            self::CUFF_LINKS,
            self::PENDANTS,
            self::PIERCINGS,
            self::TIE_CLIPS => 5,
            self::BRACELETS,
            self::CHAINS,
            self::RINGS,
            self::EARRINGS  => 15
        };
    }

    public function facets(): array
    {
        return match ($this) {
            self::BEADS          => throw new \Exception('To be implemented'),
            self::BRACELETS      => throw new \Exception('To be implemented'),
            self::BROOCHES       => throw new \Exception('To be implemented'),
            self::CHAINS         => throw new \Exception('To be implemented'),
            self::CHARM_PENDANTS => throw new \Exception('To be implemented'),
            self::CUFF_LINKS     => throw new \Exception('To be implemented'),
            self::EARRINGS       => throw new \Exception('To be implemented'),
            self::NECKLACES      => throw new \Exception('To be implemented'),
            self::PENDANTS       => throw new \Exception('To be implemented'),
            self::PIERCINGS      => throw new \Exception('To be implemented'),
            self::RINGS          => throw new \Exception('To be implemented'),
            self::TIE_CLIPS      => throw new \Exception('To be implemented'),
        };
    }

    public function stones(): array
    {
        return match ($this) {
            self::BEADS          => [
                StoneNamesEnum::NATURAL_SEA_PEARL->value,
                StoneNamesEnum::CULTURED_SEA_PEARLS->value,
                StoneNamesEnum::NATURAL_RIVER_PEARLS->value,
                StoneNamesEnum::CULTURED_RIVER_PEARLS->value,
                StoneNamesEnum::RHINESTONE->value,
                StoneNamesEnum::SMOKEY_QUARTZ->value,
                StoneNamesEnum::SNOW_QUARTZ->value,
                StoneNamesEnum::ROSE_QUARTZ->value,
                StoneNamesEnum::RUTILATED_QUARTZ->value,
                StoneNamesEnum::SHUNGITE->value,
                StoneNamesEnum::NEPHRITIS->value,
                StoneNamesEnum::CORAL->value,
                StoneNamesEnum::RHODONITE->value,
                StoneNamesEnum::PARAIBA_TOURMALINE->value,
                StoneNamesEnum::TOURMALINE->value,
                StoneNamesEnum::BLUE_TURQUOISE->value,
                StoneNamesEnum::GREEN_TURQUOISE->value,
                StoneNamesEnum::MOTHER_PEARL->value,
            ],
            self::BRACELETS      => [
                StoneNamesEnum::AGATE->value,
                StoneNamesEnum::AMETHYST->value,
                StoneNamesEnum::BLUE_TURQUOISE->value,
                StoneNamesEnum::GREEN_TURQUOISE->value,
                StoneNamesEnum::LABRADORITE->value,
                StoneNamesEnum::HEMATITE->value,
                StoneNamesEnum::TIGER_EYE->value,
                StoneNamesEnum::LAZURITE->value,
                StoneNamesEnum::NEPHRITIS->value,
                StoneNamesEnum::SMOKEY_QUARTZ->value,
                StoneNamesEnum::SNOW_QUARTZ->value,
                StoneNamesEnum::ROSE_QUARTZ->value,
                StoneNamesEnum::RUTILATED_QUARTZ->value,
                StoneNamesEnum::NATURAL_SEA_PEARL->value,
                StoneNamesEnum::CULTURED_SEA_PEARLS->value,
                StoneNamesEnum::NATURAL_RIVER_PEARLS->value,
                StoneNamesEnum::CULTURED_RIVER_PEARLS->value,
                StoneNamesEnum::CORAL->value,
                StoneNamesEnum::AMBER->value,
                StoneNamesEnum::DIAMOND->value,
                StoneNamesEnum::EMERALD->value,
                StoneNamesEnum::RUBY->value,
                StoneNamesEnum::SAPPHIRE->value,
                StoneNamesEnum::SAPPHIRE_GREEN->value,
                StoneNamesEnum::SAPPHIRE_PINK->value,
                StoneNamesEnum::STAR_SAPPHIRE->value,
                StoneNamesEnum::ALEXANDRITE->value,
                StoneNamesEnum::PYROPE->value,
                StoneNamesEnum::ALMANDINE->value,
                StoneNamesEnum::SPESSARTINE->value,
                StoneNamesEnum::GROSSULAR->value,
                StoneNamesEnum::UVAROVITE->value,
                StoneNamesEnum::DEMANTOID->value,
                StoneNamesEnum::RHODOLITE->value,
                StoneNamesEnum::ANDRADITE->value,
                StoneNamesEnum::TOPAZOLITE->value,
            ],
            self::BROOCHES       => [],
            self::CHAINS         => [],
            self::CHARM_PENDANTS => [],
            self::CUFF_LINKS     => [],
            self::EARRINGS       => [],
            self::NECKLACES      => [],
            self::PENDANTS       => [],
            self::PIERCINGS      => [],
            self::RINGS          => [],
            self::TIE_CLIPS      => [],
        };
    }
}
