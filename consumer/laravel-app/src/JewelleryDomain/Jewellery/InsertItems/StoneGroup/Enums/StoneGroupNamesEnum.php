<?php

namespace JewelleryDomain\Jewellery\InsertItems\StoneGroup\Enums;

use JewelleryDomain\Jewellery\InsertItems\Stone\Enums\StoneNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\StoneGrade\Enums\StoneGradeNamesEnum;

enum StoneGroupNamesEnum: string
{
    case PRECIOUS             = 'драгоценные';
    case JEWELLERIES          = 'ювелирные';
    case JEWELLERY_ORNAMENTAL = 'ювелирно-поделочные';
    case ORNAMENTAL           = 'поделочные';

    public function description(): string
    {
        return match ($this) {
            self::PRECIOUS             => 'Драгоценными камнями в России официально являются алмазы, рубины, изумруды, сапфиры, александриты и природный жемчуг',
            self::JEWELLERIES          => 'Вторая по ценности группа камней следующая после драгоценных. Внутри группы камни подразделяются на четыре порядка',
            self::JEWELLERY_ORNAMENTAL => 'Третья по ценности группа камней следующая после драгоценных и ювелирных. Внутри группы камни подразделяются на два порядка',
            self::ORNAMENTAL           => 'Четвертая и последняя по ценности группа камней без разделения на порядки',
        };
    }

    public function grades(): array
    {
        return match ($this) {
            self::PRECIOUS,
            self::ORNAMENTAL => [],
            self::JEWELLERIES          => [
                StoneGradeNamesEnum::FIRST_GRADE->value,
                StoneGradeNamesEnum::SECOND_GRADE->value,
                StoneGradeNamesEnum::THIRD_GRADE->value,
                StoneGradeNamesEnum::FORTH_GRADE->value,
            ],
            self::JEWELLERY_ORNAMENTAL => [
                StoneGradeNamesEnum::FIRST_GRADE->value,
                StoneGradeNamesEnum::SECOND_GRADE->value,
            ],
        };
    }

    public function stones(): array
    {
        return match ($this) {
            self::PRECIOUS => [
                StoneNamesEnum::DIAMOND->value,
                StoneNamesEnum::ALEXANDRITE->value,
                StoneNamesEnum::RUBY->value,
                StoneNamesEnum::EMERALD->value,
                StoneNamesEnum::SAPPHIRE->value,
                StoneNamesEnum::NATURAL_SEA_PEARL->value,
            ],
            self::ORNAMENTAL => [
                StoneNamesEnum::AGALMATALITE->value,
                StoneNamesEnum::BRECCIA->value,
                StoneNamesEnum::GAGAT->value,
                StoneNamesEnum::WRITING_GRANITE->value,
                StoneNamesEnum::GOLDITE->value,
                StoneNamesEnum::CACHOLONG->value,
                StoneNamesEnum::QUARTZITE->value,
                StoneNamesEnum::SERAPHINITIS->value,
                StoneNamesEnum::CONGLOMERATE->value,
                StoneNamesEnum::PATTERNED_FLINT->value,
                StoneNamesEnum::OBSIDIAN->value,
                StoneNamesEnum::PETRIFIED_WOOD->value,
                StoneNamesEnum::MARBLED_ONYX->value,
                StoneNamesEnum::OPHIOCALCITE->value,
                StoneNamesEnum::ORNAMENTAL_PORPHYRIES->value,
                StoneNamesEnum::SELENITE->value,
                StoneNamesEnum::SERPENTINITE->value,
                StoneNamesEnum::SKARN->value,
                StoneNamesEnum::SOAPSTONE->value,
                StoneNamesEnum::THUILITE->value,
                StoneNamesEnum::FLUORITE->value,
                StoneNamesEnum::SHUNGITE->value,
                StoneNamesEnum::MONOCHROMATIC_JASPER->value,
                StoneNamesEnum::BANDED_JASPER->value,
            ],
            self::JEWELLERIES => [
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
                StoneNamesEnum::VESUVIANITE->value,
                StoneNamesEnum::VESUVIANITE->value,
                StoneNamesEnum::DRAVITE->value,
                StoneNamesEnum::RIVER_PEARL_NATURE->value,
                StoneNamesEnum::SEA_PEARL_CULTURED->value,
                StoneNamesEnum::CULTURED_RIVER_PEARLS->value,
                StoneNamesEnum::INDIGOLITE->value,
                StoneNamesEnum::IOLITE->value,
                StoneNamesEnum::CASSETTERITE->value,
                StoneNamesEnum::KYANITE->value,
                StoneNamesEnum::CLINOHUMITE->value,
            ],
            self::JEWELLERY_ORNAMENTAL => [
                StoneNamesEnum::AGATE->value,
                StoneNamesEnum::AZURITE->value,
                StoneNamesEnum::AVENTURINE->value,
                StoneNamesEnum::ADULARIA->value,
                StoneNamesEnum::ACTINOLITE->value,
                StoneNamesEnum::AMAZONITE->value,
                StoneNamesEnum::RHINESTONE->value,
            ],
        };
    }
}
