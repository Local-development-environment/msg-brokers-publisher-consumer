<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewellery\CoverageItems\Coverage\Enums;

use JewelleryDomain\Jewellery\PreciousMetalItems\PreciousMetal\Enums\PreciousMetalNamesEnum;

enum CoverageNamesEnum: string
{
    case GOLDING         = 'золочение';
    case RHODIUM_PLATING = 'родирование';
    case OXIDATION       = 'оксидирование';
    case DIAMOND_CUT     = 'алмазная грань';
    case ENAMEL          = 'эмаль';

    public function description(): string
    {
        return match ($this) {
            self::GOLDING,        => 'Покрытие серебра слоем из молекул золота препятствует окислению и потемнению. Визуальное благородство – позволяет доступным украшениям из серебра выглядеть стильно и дорого.',
            self::RHODIUM_PLATING => 'Покрытие обладает высокой прочностью износостойкостью и устойчивостью к воздействию внешней среды. С помощью этого покрытия ювелиры добиваются эффекта благородного “белого золота”.',
            self::OXIDATION       => 'Чернение под старину – это декоративное покрытие из стойкой и равномерной пленки сульфида. Эта обработка – очень сильная защита серебра от окисления и естественного потемнения.',
            self::DIAMOND_CUT     => 'Алмазная грань в ювелирном деле это метод обработки металла (например, золота) алмазным резцом для создания узоров, имитирующих грани бриллианта, что придает изделию особый блеск и текстуру. ',
            self::ENAMEL          => 'Ювелирная эмаль — это тонкий слой стекловидного покрытия, который наносится на металлическую основу (золото, серебро и др.) для придания украшениям цвета, блеска и оригинальности.',
        };
    }

    public function jwProbability(): int
    {
        return match ($this) {
            self::GOLDING         => 20,
            self::RHODIUM_PLATING => 20,
            self::OXIDATION       => 20,
            self::DIAMOND_CUT     => 20,
            self::ENAMEL          => 20,
        };
    }

    public function metals(): array
    {
        return match ($this) {
            self::GOLDING,
            self::OXIDATION => [
                PreciousMetalNamesEnum::SILVER->value
            ],
            self::RHODIUM_PLATING => [
                PreciousMetalNamesEnum::SILVER->value,
                PreciousMetalNamesEnum::GOLDEN_RED->value,
                PreciousMetalNamesEnum::GOLDEN_WHITE->value,
                PreciousMetalNamesEnum::GOLDEN_YELLOW->value
            ],
            self::DIAMOND_CUT,
            self::ENAMEL => [
                PreciousMetalNamesEnum::SILVER->value,
                PreciousMetalNamesEnum::GOLDEN_RED->value,
                PreciousMetalNamesEnum::GOLDEN_WHITE->value,
                PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
                PreciousMetalNamesEnum::PALLADIUM->value,
                PreciousMetalNamesEnum::PLATINUM->value,
            ]
        };
    }
}
