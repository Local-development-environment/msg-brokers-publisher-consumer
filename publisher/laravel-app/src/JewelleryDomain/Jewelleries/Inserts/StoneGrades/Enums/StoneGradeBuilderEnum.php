<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneGrades\Enums;

use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Enums\StoneGroupBuilderEnum;
use JewelleryDomain\Jewelleries\Inserts\Stones\Enums\StoneBuilderEnum;

enum StoneGradeBuilderEnum: string
{
    case FIRST_GRADE  = 'первый порядок';
    case SECOND_GRADE = 'второй порядок';
    case THIRD_GRADE  = 'третий порядок';
    case FORTH_GRADE  = 'четвертый порядок';

    public function description(): string
    {
        return match($this) {
            self::FIRST_GRADE => 'Ювелирные и ювелирно-поделочные камни бывают первого порядка в пределах своей группы',
            self::SECOND_GRADE => 'Ювелирные и ювелирно-поделочные камни бывают второго порядка в пределах своей группы',
            self::THIRD_GRADE  => 'Ювелирные камни бывают третьего порядка в пределах своей группы',
            self::FORTH_GRADE  => 'Ювелирные камни бывают четвертого порядка в пределах своей группы',
        };
    }

    public function stones(): array
    {
        return match ($this) {
            self::FIRST_GRADE => [
                StoneGroupBuilderEnum::JEWELLERIES->value => [
                    StoneBuilderEnum::DEMANTOID->value,
                ],
                StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value => [
                    StoneBuilderEnum::AGATE->value,
                    StoneBuilderEnum::AZURITE->value,
                ]
            ],
            self::SECOND_GRADE => [
                StoneGroupBuilderEnum::JEWELLERIES->value => [
                    StoneBuilderEnum::AQUAMARINE->value,
                    StoneBuilderEnum::AQUAMARINE_CAT_EYE->value,
                    StoneBuilderEnum::BIXBITE->value,
                    StoneBuilderEnum::VOROBYEVITE->value,
                    StoneBuilderEnum::JACINTH->value,
                    StoneBuilderEnum::HIDDENITE->value,
                ],
                StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value => [
                    StoneBuilderEnum::AVENTURINE->value,
                    StoneBuilderEnum::MOONSTONE->value,
                    StoneBuilderEnum::ACTINOLITE->value,
                    StoneBuilderEnum::AMAZONITE->value,
                ]
            ],
            self::THIRD_GRADE => [
                StoneGroupBuilderEnum::JEWELLERIES->value => [
                    StoneBuilderEnum::ALMANDINE_GARNET->value,
                    StoneBuilderEnum::AMETHYST->value,
                    StoneBuilderEnum::AMETRINE->value,
                    StoneBuilderEnum::VERDELITE->value,
                    StoneBuilderEnum::HELIODOR->value,
                    StoneBuilderEnum::GOSHENITE->value,
                    StoneBuilderEnum::STAR_DIOPSIDE->value,
                ],
                StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value => [

                ]
            ],
            self::FORTH_GRADE => [
                StoneGroupBuilderEnum::JEWELLERIES->value => [
                    StoneBuilderEnum::AXINITE->value,
                    StoneBuilderEnum::ANDALUSITE->value,
                    StoneBuilderEnum::ANDRADITE_GARNET->value,
                    StoneBuilderEnum::ACHROITE->value,
                    StoneBuilderEnum::BRAZILIANITE->value,
                    StoneBuilderEnum::VESUVIANITE->value,
                ],
                StoneGroupBuilderEnum::JEWELLERY_ORNAMENTAL->value => [

                ]
            ],
        };
    }
}
