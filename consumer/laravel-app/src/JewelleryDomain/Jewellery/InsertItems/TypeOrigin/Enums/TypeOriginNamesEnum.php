<?php

namespace JewelleryDomain\Jewellery\InsertItems\TypeOrigin\Enums;

use JewelleryDomain\Jewellery\InsertItems\Stone\Enums\StoneNamesEnum;

enum TypeOriginNamesEnum: string
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
                StoneNamesEnum::SEA_PEARL_NATURE->value,
                StoneNamesEnum::DIAMOND->value,
                StoneNamesEnum::RUBY->value,
                StoneNamesEnum::SAPPHIRE->value,
                StoneNamesEnum::EMERALD->value,
                StoneNamesEnum::ALEXANDRITE->value,
                StoneNamesEnum::DEMANTOID->value,
                StoneNamesEnum::AQUAMARINE->value,
                StoneNamesEnum::AQUAMARINE_CAT_EYE->value,
                StoneNamesEnum::BIXBITE->value,
                StoneNamesEnum::VOROBYEVITE->value,
                StoneNamesEnum::JACINTH->value,
                StoneNamesEnum::HIDDENITE->value,
                StoneNamesEnum::ALMANDINE_GARNET->value,
                StoneNamesEnum::AMETHYST->value,
                StoneNamesEnum::AMETRINE->value,
                StoneNamesEnum::VERDELITE->value,
                StoneNamesEnum::HELIODOR->value,
                StoneNamesEnum::GOSHENITE->value,
                StoneNamesEnum::AXINITE->value,
                StoneNamesEnum::ANDALUSITE->value,
                StoneNamesEnum::ANDRADITE_GARNET->value,
                StoneNamesEnum::ACHROITE->value,
                StoneNamesEnum::BRAZILIANITE->value,
                StoneNamesEnum::VESUVIANITE->value,
                StoneNamesEnum::AGATE->value,
                StoneNamesEnum::AZURITE->value,
                StoneNamesEnum::AVENTURINE->value,
                StoneNamesEnum::MOONSTONE->value,
                StoneNamesEnum::ACTINOLITE->value,
                StoneNamesEnum::AMAZONITE->value,
                StoneNamesEnum::AGALMATOLITE->value,
                StoneNamesEnum::JET->value,
            ],
            self::IMITATION => [
                StoneNamesEnum::NANO_SPINEL->value,
                StoneNamesEnum::SAPPHIRE_GROWN->value,
                StoneNamesEnum::SAPPHIRE_CHAMELEON_GROWN->value,
                StoneNamesEnum::DIAMOND_GROWN->value,
                StoneNamesEnum::EMERALD_GROWN->value,
            ],
            self::GROWN     => [
                StoneNamesEnum::CUBIC_ZIRCONIA->value,
                StoneNamesEnum::MOISSANITE->value,
                StoneNamesEnum::OPAL_IMITATION->value,
                StoneNamesEnum::ALPANITE->value,
            ],
        };
    }
}
