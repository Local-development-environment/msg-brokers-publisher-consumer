<?php

namespace Domain\Stones\TypeOrigins\Enums;

use Domain\Stones\Stones\Enums\StoneBuilderEnum;

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

    public function stones(): array
    {
        return match ($this) {
            self::NATURE    => [
                StoneBuilderEnum::SEA_PEARL_NATURE->value,
                StoneBuilderEnum::DIAMOND->value,
                StoneBuilderEnum::RUBY->value,
                StoneBuilderEnum::SAPPHIRE->value,
                StoneBuilderEnum::EMERALD->value,
                StoneBuilderEnum::ALEXANDRITE->value,
                StoneBuilderEnum::DEMANTOID->value,
                StoneBuilderEnum::AQUAMARINE->value,
                StoneBuilderEnum::AQUAMARINE_CAT_EYE->value,
                StoneBuilderEnum::BIXBITE->value,
                StoneBuilderEnum::VOROBYEVITE->value,
                StoneBuilderEnum::JACINTH->value,
                StoneBuilderEnum::HIDDENITE->value,
                StoneBuilderEnum::ALMANDINE_GARNET->value,
                StoneBuilderEnum::AMETHYST->value,
                StoneBuilderEnum::AMETRINE->value,
                StoneBuilderEnum::VERDELITE->value,
                StoneBuilderEnum::HELIODOR->value,
                StoneBuilderEnum::GOSHENITE->value,
                StoneBuilderEnum::AXINITE->value,
                StoneBuilderEnum::ANDALUSITE->value,
                StoneBuilderEnum::ANDRADITE_GARNET->value,
                StoneBuilderEnum::ACHROITE->value,
                StoneBuilderEnum::BRAZILIANITE->value,
                StoneBuilderEnum::VESUVIANITE->value,
                StoneBuilderEnum::AGATE->value,
                StoneBuilderEnum::AZURITE->value,
                StoneBuilderEnum::AVENTURINE->value,
                StoneBuilderEnum::MOONSTONE->value,
                StoneBuilderEnum::ACTINOLITE->value,
                StoneBuilderEnum::AMAZONITE->value,
                StoneBuilderEnum::AGALMATOLITE->value,
                StoneBuilderEnum::JET->value,
            ],
            self::IMITATION => [
                StoneBuilderEnum::NANO_SPINEL->value,
                StoneBuilderEnum::SAPPHIRE_GROWN->value,
                StoneBuilderEnum::SAPPHIRE_CHAMELEON_GROWN->value,
                StoneBuilderEnum::DIAMOND_GROWN->value,
                StoneBuilderEnum::EMERALD_GROWN->value,
            ],
            self::GROWN     => [
                StoneBuilderEnum::CUBIC_ZIRCONIA->value,
                StoneBuilderEnum::MOISSANITE->value,
                StoneBuilderEnum::OPAL_IMITATION->value,
                StoneBuilderEnum::ALPANITE->value,
            ],
        };
    }
}
