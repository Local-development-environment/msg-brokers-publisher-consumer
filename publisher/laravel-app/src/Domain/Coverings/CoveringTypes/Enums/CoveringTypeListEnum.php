<?php

declare(strict_types=1);

namespace Domain\Coverings\CoveringTypes\Enums;

use Domain\Coverings\CoveringFunctions\Enums\CoveringFunctionListEnum;
use Domain\PreciousMetals\MetalTypes\Enums\MetalTypeListEnum;

enum CoveringTypeListEnum: string
{
    case PLATINIZING     = 'платинирование';
    case GOLDING         = 'золочение';
    case PARTLY_GOLDING  = 'частичное золочение';
    case RHODIUM_PLATING = 'родирование';
    case PARTLY_RHODIUM_PLATING = 'частичное родирование';
    case OXIDATION       = 'оксидирование';
    case DIAMOND_CUT     = 'алмазная грань';
    case ENAMEL          = 'эмаль';

    public function description(): string
    {
        return match ($this) {
            self::PLATINIZING => 'Гальванический метод покрытия изделий из серебра слоем платины, который обладает высокой прочностью к истиранию и окислению. Платина имеет эффектный глянцевый блеск, а цвет - более светлый и яркий.',
            self::GOLDING => 'Покрытие серебра слоем из молекул золота препятствует окислению и потемнению. Визуальное благородство – позволяет доступным украшениям из серебра выглядеть стильно и дорого.',
            self::RHODIUM_PLATING => 'Покрытие обладает высокой прочностью износостойкостью и устойчивостью к воздействию внешней среды. С помощью этого покрытия ювелиры добиваются эффекта благородного “белого золота”.',
            self::PARTLY_RHODIUM_PLATING => 'Такое покрытие используют в основном для изделий из золота или позолоченных. Его цель – создать контрастные элементы.',
            self::OXIDATION => 'Чернение под старину – это декоративное покрытие из стойкой и равномерной пленки сульфида. Эта обработка – очень сильная защита серебра от окисления и естественного потемнения.',
            self::DIAMOND_CUT => 'Алмазная грань в ювелирном деле это метод обработки металла (например, золота) алмазным резцом для создания узоров, имитирующих грани бриллианта, что придает изделию особый блеск и текстуру. ',
            self::ENAMEL => 'Ювелирная эмаль — это тонкий слой стекловидного покрытия, который наносится на металлическую основу (золото, серебро и др.) для придания украшениям цвета, блеска и оригинальности.',
            self::PARTLY_GOLDING => 'Золотом покрывают не все изделие, а лишь некоторые его части. Таким образом, изделие выглядит контрастно, ярко.',
        };
    }

    public function functions(): string
    {
        return match ($this) {
            self::PLATINIZING, self::GOLDING, self::RHODIUM_PLATING,
            self::OXIDATION => CoveringFunctionListEnum::PROTECTIVE->value, self::DIAMOND_CUT, self::ENAMEL,
            self::PARTLY_GOLDING, self::PARTLY_RHODIUM_PLATING => CoveringFunctionListEnum::DECORATIVE->value,
        };
    }
}
