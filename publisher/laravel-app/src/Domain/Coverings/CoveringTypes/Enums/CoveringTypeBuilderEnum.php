<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringTypes\Enums;

use Domain\Coverings\CoveringFunctions\Enums\CoveringFunctionBuilderEnum;
use Domain\Coverings\CoveringShades\Enums\CoveringShadeBuilderEnum;

enum CoveringTypeBuilderEnum: string
{
    case GOLDING  = 'золочение';
    case RHODIUM_PLATING = 'родирование';
    case OXIDATION       = 'оксидирование';
    case DIAMOND_CUT     = 'алмазная грань';
    case ENAMEL          = 'эмаль';

    public function description(): string
    {
        return match ($this) {
            self::GOLDING, => 'Покрытие серебра слоем из молекул золота препятствует окислению и потемнению. Визуальное благородство – позволяет доступным украшениям из серебра выглядеть стильно и дорого.',
            self::RHODIUM_PLATING => 'Покрытие обладает высокой прочностью износостойкостью и устойчивостью к воздействию внешней среды. С помощью этого покрытия ювелиры добиваются эффекта благородного “белого золота”.',
            self::OXIDATION => 'Чернение под старину – это декоративное покрытие из стойкой и равномерной пленки сульфида. Эта обработка – очень сильная защита серебра от окисления и естественного потемнения.',
            self::DIAMOND_CUT => 'Алмазная грань в ювелирном деле это метод обработки металла (например, золота) алмазным резцом для создания узоров, имитирующих грани бриллианта, что придает изделию особый блеск и текстуру. ',
            self::ENAMEL => 'Ювелирная эмаль — это тонкий слой стекловидного покрытия, который наносится на металлическую основу (золото, серебро и др.) для придания украшениям цвета, блеска и оригинальности.',
        };
    }

    public function functions(): string
    {
        return match ($this) {
            self::GOLDING,
            self::RHODIUM_PLATING => CoveringFunctionBuilderEnum::PROTECTIVE->value,
            self::DIAMOND_CUT,
            self::OXIDATION,
            self::ENAMEL => CoveringFunctionBuilderEnum::DECORATIVE->value,
        };
    }

    public function shades(): string
    {
        return match ($this) {
            self::GOLDING => CoveringShadeBuilderEnum::GOLDEN_RED->value . ',' .
                CoveringShadeBuilderEnum::GOLDEN_YELLOW->value . ',' . CoveringShadeBuilderEnum::GOLDEN_PINK->value,
            self::RHODIUM_PLATING => CoveringShadeBuilderEnum::RHODIUM_LIGHT_GRAY->value,
            self::OXIDATION => CoveringShadeBuilderEnum::BLACKENING->value,
            self::DIAMOND_CUT => CoveringShadeBuilderEnum::NO_SHADE->value,
            self::ENAMEL      => CoveringShadeBuilderEnum::ENAMEL_COLOUR->value
        };
    }
}
