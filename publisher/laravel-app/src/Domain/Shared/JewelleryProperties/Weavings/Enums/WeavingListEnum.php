<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\Weavings\Enums;

use Domain\Shared\JewelleryProperties\BaseWeavings\Enums\BaseWeavingListEnum;

enum WeavingListEnum: string
{
    /** Bismarck */
    case BYZANTINE = 'византийское';
    case CLASSIC_BISMARCK = 'классический бисмарк';
    case BISMARCK_DOUBLE = 'бисмарк двойной';
    case BISMARCK_TRIPLE = 'бисмарк тройной';
    case PYTHON = 'питон';

    /** Panther */
    case PANTHER_DOUBLE = 'панцирное двойное';
    case PANTHER_CLASSIC = 'панцирное';
    case NONNA = 'нонна';
    case GOURMETTE = 'гурме';
    case LOVE = 'лав';
    case SINGAPORE = 'сингапур';
    case PAPERCLIP = 'скрепка';
    case FIGARO = 'фигаро';
    case WHEAT = 'колосок';
    case SNAKE = 'снейк';
    case TRIPLE_ROMBO = 'ромб тройной';
    case DOUBLE_ROMBO = 'ромб двойной';
    case ROMBO = 'ромб';

    /** Anchor */
    case ANCHOR = 'якорное';
    case ROLLO = 'ролло';
    case CHOPARD = 'шопард';
    case CORDA = 'кордовое';
    case DOUBLE_ANCHOR = 'двойное якорное';

    public function description(): string
    {
        return match ($this) {
            /** Bismarck */
            self::BYZANTINE => 'Объемное, сложное плетение, которое может напоминать кольчугу.',
            self::CLASSIC_BISMARCK => 'Звенья овальной формы, одно из самых популярных плетений',
            self::BISMARCK_DOUBLE => 'Две цепочки спаиваются в одну, образуя очень плотное и прочное изделие',
            self::BISMARCK_TRIPLE => 'Три цепочки спаиваются в одну, образуя очень плотное и прочное изделие',
            self::PYTHON => 'Три ряда тонких округлых звеньев переплетают между собой, образуя эффектную и аккуратную цепь.',

            /** Panther */
            self::PANTHER_CLASSIC => 'Звенья располагаются не перпендикулярно, а под углом друг к другу, что позволяет выровнять изделие в плоскости.',
            self::PANTHER_DOUBLE => 'Плотное скрепление звеньев так, что каждое второе перекрывает предыдущее. Таким образом, получается цепочка из деталей в два ряда.',
            self::GOURMETTE => 'Это плетение характеризуется тем, что звенья, отшлифованные с обеих сторон, соединены последовательно в одной плоскости',
            self::NONNA => 'Выглядит как две дорожки довольно плоских звеньев. В свою очередь, в каждой из них последовательно чередуются звенья двух размеров – большого и маленького',
            self::LOVE => '«Лав» — легкое, воздушное плетение. У каждого звена такой цепи завернутые внутрь концы, напоминающие по форме сердце, — отсюда и романтичное название.',
            self::SINGAPORE => 'Звенья соединены под углом, создавая эффект кручения и блеска, что делает его популярным среди женщин.',
            self::PAPERCLIP => 'Имеет сходство с канцелярской скрепкой. ',
            self::FIGARO => 'Сочетает в себе как короткие, так и длинные звенья в определенной последовательности',
            self::WHEAT => 'Сложное плетение, где звенья располагаются в виде колоска.',
            self::SNAKE => 'Звенья располагаются в шахматном порядке, имитируя изгибы змеи.',
            self::TRIPLE_ROMBO => 'Три цепочки Ромбо спаиваются в одну',
            self::DOUBLE_ROMBO => 'Две цепочки Ромбо спаиваются в одну',
            self::ROMBO => 'При изготовлении звенья цепочки специально перекручивают таким образом, чтобы они лежали в одной плоскости. В итоге получается ровное, гладкое и плоское украшение, которое отличается хорошей износостойкостью.',

            /** Anchor */
            self::ANCHOR => 'Звенья овальной формы соединяются между собой перпендикулярно друг к другу',
            self::ROLLO => 'плетение с круглыми звеньями, отличием является сама форма колец цепочки, она выглядит более объёмной, а звенья браслета ближе расположены друг к другу',
            self::CHOPARD => 'Плетение Chopard – это идеально круглые звенья, соединенные перпендикулярно друг к другу',
            self::CORDA => 'Сложная форма плетения, когда цепь получается скрученной за счет соединения нескольких звеньев одновременно.',
            self::DOUBLE_ANCHOR => 'плоское плетение, где два звена соединены друг с другом под углом',

        };
    }

    public function baseWeaving(): string
    {
        return match ($this) {
            self::BYZANTINE, self::CLASSIC_BISMARCK, self::BISMARCK_DOUBLE, self::BISMARCK_TRIPLE, self::PYTHON,
             => BaseWeavingListEnum::BISMARCK->value,
            self::PANTHER_DOUBLE, self::PANTHER_CLASSIC, self::NONNA, self::GOURMETTE, self::LOVE, self::SINGAPORE,
            self::PAPERCLIP, self::FIGARO, self::WHEAT, self::SNAKE, self::TRIPLE_ROMBO,
            self::DOUBLE_ROMBO => BaseWeavingListEnum::PANTHER->value,
            self::ROMBO, self::ANCHOR, self::ROLLO, self::CHOPARD, self::CORDA,
            self::DOUBLE_ANCHOR => BaseWeavingListEnum::ANCHOR->value,

        };
    }

    public function altNames(): array
    {
        return match ($this) {
            self::BYZANTINE => ['византийский бисмарк','лисий хвост','королевское'],
            self::CLASSIC_BISMARCK => ['бисмарк'],
            self::BISMARCK_DOUBLE => [],
            self::BISMARCK_TRIPLE => [],
            self::PYTHON => ['кардинал','кайзер'],
            self::DOUBLE_ANCHOR => ['гарибальди'],
            self::PANTHER_DOUBLE => [],
            self::PANTHER_CLASSIC => ['панцирное'],
            self::NONNA => [],
            self::GOURMETTE => [],
            self::LOVE => [],
            self::SINGAPORE => [],
            self::PAPERCLIP => ['улитка'],
            self::FIGARO => ['картье'],
            self::WHEAT => [],
            self::SNAKE => [],
            self::TRIPLE_ROMBO => [],
            self::DOUBLE_ROMBO => [],
            self::ROMBO => [],
            self::ANCHOR => [],
            self::ROLLO => [],
            self::CHOPARD => [],
            self::CORDA => []
        };
    }
}
