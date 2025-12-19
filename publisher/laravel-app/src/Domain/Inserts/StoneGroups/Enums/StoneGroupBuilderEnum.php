<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGroups\Enums;

use Domain\Inserts\StoneGrades\Enums\StoneGradeBuilderEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeEnum;
use Domain\Inserts\Stones\Enums\StoneBuilderEnum;

enum StoneGroupBuilderEnum: string
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
                StoneGradeBuilderEnum::FIRST_GRADE->value,
                StoneGradeBuilderEnum::SECOND_GRADE->value,
                StoneGradeBuilderEnum::THIRD_GRADE->value,
                StoneGradeBuilderEnum::FORTH_GRADE->value,
            ],
            self::JEWELLERY_ORNAMENTAL => [
                StoneGradeBuilderEnum::FIRST_GRADE->value,
                StoneGradeBuilderEnum::SECOND_GRADE->value,
            ],
        };
    }

    public function stones(): array
    {
        return match ($this) {
            self::PRECIOUS => [
                StoneBuilderEnum::DIAMOND->value,
                StoneBuilderEnum::ALEXANDRITE->value,
                StoneBuilderEnum::RUBY->value,
                StoneBuilderEnum::EMERALD->value,
                StoneBuilderEnum::SAPPHIRE->value,
                StoneBuilderEnum::SEA_PEARL_NATURE->value,
            ],
            self::ORNAMENTAL => [
                StoneBuilderEnum::AGALMATOLITE->value,
                StoneBuilderEnum::JET->value,
            ],
            self::JEWELLERIES => [
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
                StoneBuilderEnum::VESUVIANITE->value,
                StoneBuilderEnum::VESUVIANITE->value,
                StoneBuilderEnum::DRAVITE->value,
                StoneBuilderEnum::RIVER_PEARL_NATURE->value,
                StoneBuilderEnum::SEA_PEARL_CULTURED->value,
                StoneBuilderEnum::RIVER_PEARL_CULTURED->value,
                StoneBuilderEnum::INDIGOLITE->value,
                StoneBuilderEnum::IOLITE->value,
                StoneBuilderEnum::CASSITERITE->value,
                StoneBuilderEnum::KYANITE->value,
            ],
            self::JEWELLERY_ORNAMENTAL => [
                StoneBuilderEnum::AGATE->value,
                StoneBuilderEnum::AZURITE->value,
                StoneBuilderEnum::AVENTURINE->value,
                StoneBuilderEnum::MOONSTONE->value,
                StoneBuilderEnum::ACTINOLITE->value,
                StoneBuilderEnum::AMAZONITE->value,
                StoneBuilderEnum::RHINE_STONE->value,
            ],
        };
    }
}
