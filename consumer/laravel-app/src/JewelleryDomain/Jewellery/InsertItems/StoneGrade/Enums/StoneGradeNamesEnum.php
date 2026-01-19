<?php

namespace JewelleryDomain\Jewellery\InsertItems\StoneGrade\Enums;

use JewelleryDomain\Jewellery\InsertItems\Stone\Enums\StoneNamesEnum;
use JewelleryDomain\Jewellery\InsertItems\StoneGroup\Enums\StoneGroupNamesEnum;

enum StoneGradeNamesEnum: string
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
                StoneGroupNamesEnum::JEWELLERIES->value => [
                    StoneNamesEnum::DEMANTOID->value,
                ],
                StoneGroupNamesEnum::JEWELLERY_ORNAMENTAL->value => [
                    StoneNamesEnum::AGATE->value,
                    StoneNamesEnum::AZURITE->value,
                ]
            ],
            self::SECOND_GRADE => [
                StoneGroupNamesEnum::JEWELLERIES->value => [
                    StoneNamesEnum::AQUAMARINE->value,
                    StoneNamesEnum::AQUAMARINE_CAT_EYE->value,
                    StoneNamesEnum::BIXBITE->value,
                    StoneNamesEnum::VOROBYEVITE->value,
                    StoneNamesEnum::JACINTH->value,
                    StoneNamesEnum::HIDDENITE->value,
                ],
                StoneGroupNamesEnum::JEWELLERY_ORNAMENTAL->value => [
                    StoneNamesEnum::AVENTURINE->value,
                    StoneNamesEnum::MOONSTONE->value,
                    StoneNamesEnum::ACTINOLITE->value,
                    StoneNamesEnum::AMAZONITE->value,
                ]
            ],
            self::THIRD_GRADE => [
                StoneGroupNamesEnum::JEWELLERIES->value => [
                    StoneNamesEnum::ALMANDINE_GARNET->value,
                    StoneNamesEnum::AMETHYST->value,
                    StoneNamesEnum::AMETRINE->value,
                    StoneNamesEnum::VERDELITE->value,
                    StoneNamesEnum::HELIODOR->value,
                    StoneNamesEnum::GOSHENITE->value,
                    StoneNamesEnum::STAR_DIOPSIDE->value,
                ],
                StoneGroupNamesEnum::JEWELLERY_ORNAMENTAL->value => [

                ]
            ],
            self::FORTH_GRADE => [
                StoneGroupNamesEnum::JEWELLERIES->value => [
                    StoneNamesEnum::AXINITE->value,
                    StoneNamesEnum::ANDALUSITE->value,
                    StoneNamesEnum::ANDRADITE_GARNET->value,
                    StoneNamesEnum::ACHROITE->value,
                    StoneNamesEnum::BRAZILIANITE->value,
                    StoneNamesEnum::VESUVIANITE->value,
                ],
                StoneGroupNamesEnum::JEWELLERY_ORNAMENTAL->value => [

                ]
            ],
        };
    }
}
