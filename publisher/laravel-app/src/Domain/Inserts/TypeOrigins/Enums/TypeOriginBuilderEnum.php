<?php

declare(strict_types=1);

namespace Domain\Inserts\TypeOrigins\Enums;

enum TypeOriginBuilderEnum: string
{
    case NATURE    = 'природный';
    case IMITATION = 'имитация';
    case GROWN     = 'выращенный';

    public function description(): string
    {
        return match ($this) {
            self::NATURE    => 'Минерал, образовавшийся в природе, который обладает красотой, редкостью и прочностью, делающими его ценным для использования в ювелирных изделиях',
            self::IMITATION => 'Синтезированные в лабораторных условиях камни для имитации драгоценных, но с другим химическим составом',
            self::GROWN     => 'Аналоги природных камней выращенные в лабораторных условиях',
        };
    }
}
