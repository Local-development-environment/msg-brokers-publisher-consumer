<?php

declare(strict_types=1);

namespace Domain\Shared\JewelleryProperties\BaseWeavings\Enums;

enum BaseWeavingListEnum: string
{
    case ANCHOR = 'якорное';
    case BISMARCK = 'бисмарк';
    case PANTHER = 'панцирное';
    case FANTASY = 'фантазийное';

    public function description(): string
    {
        return match ($this) {
            self::ANCHOR => 'Одно из самых распространенных и простых плетений. Звенья расположены перпендикулярно друг другу, как в якорной цепи',
            self::BISMARCK => 'Звенья соединены в одной плоскости, что делает цепь более плоской и надежной',
            self::PANTHER => 'Сложное и прочное плетение, где звенья соединяются в несколько рядов',
            self::FANTASY => 'Нестандартные, уникальные и сложные виды плетения, которые не подходят под классификацию традиционных типов',
        };
    }
}
