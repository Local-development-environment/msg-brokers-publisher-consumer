<?php

declare(strict_types=1);

namespace Domain\Jewelleries\Categories\Enums;

enum CategoryBuildEnum: string
{
    case BEADS = 'бусы';
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
            self::NECKLACES      => 'Колье это шейное украшение, которое отличается выделенной центральной частью, привлекающей основное внимание, в отличие от более простых ожерелий или цепочек.',
            self::PENDANTS       => 'Куло́н ювелирное украшение, надеваемое на шею. Разновидность подвески.',
            self::PIERCINGS      => 'Пирсинг это украшение, которое носят в проколе тела.',
            self::RINGS          => 'Кольцо это украшение в виде ободка или круга из металла или другого материала, которое надевают на палец',
            self::TIE_CLIPS      => 'Зажим для галстука это мужской аксессуар в виде клипсы, предназначенный для крепления галстука к передней части рубашки'
        };
    }

    public function probability(): int
    {
        return match ($this) {
            self::BEADS => 3,
            self::BRACELETS, self::CHAINS, self::RINGS => 5,
            self::BROOCHES, self::CHARM_PENDANTS, self::CUFF_LINKS, self::PENDANTS, self::PIERCINGS, self::TIE_CLIPS => 1,
            self::EARRINGS => 4,
            self::NECKLACES => 2
        };
    }
}
