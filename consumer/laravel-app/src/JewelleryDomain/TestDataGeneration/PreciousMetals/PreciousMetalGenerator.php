<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\PreciousMetals;

use Illuminate\Support\Arr;
use JewelleryDomain\Jewellery\JewelleryCategoryItems\JewelleryCategory\Enums\JewelleryCategoryNamesEnum;
use JewelleryDomain\Jewellery\PreciousMetalItems\Hallmark\Enums\HallmarkNamesEnum;
use JewelleryDomain\Jewellery\PreciousMetalItems\PreciousMetal\Enums\PreciousMetalNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Rings\RingSpecific\Enums\RingSpecificNamesEnum;
use JewelleryDomain\Jewellery\SpecProperties\Rings\RingType\Enums\RingTypeNamesEnum;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\TestEnumsTrait;
use Random\RandomException;

final class PreciousMetalGenerator
{
    use RandomArrayElementWithProbabilityTrait, TestEnumsTrait;

    public function __construct(protected readonly array $properties)
    {
    }

    public function getPreciousMetals(): array
    {
        return match ($this->properties['jewelleryCategory']) {
            JewelleryCategoryNamesEnum::BEADS->value          => $this->getMetalBead(),
            JewelleryCategoryNamesEnum::BRACELETS->value      => $this->getMetalBracelet(),
            JewelleryCategoryNamesEnum::BROOCHES->value       => $this->getMetalBrooch(),
            JewelleryCategoryNamesEnum::CHAINS->value         => $this->getMetalChain(),
            JewelleryCategoryNamesEnum::CHARM_PENDANTS->value => $this->getMetalCharmPendant(),
            JewelleryCategoryNamesEnum::CUFF_LINKS->value     => $this->getMetalCuffLink(),
            JewelleryCategoryNamesEnum::EARRINGS->value       => $this->getMetalEarring(),
            JewelleryCategoryNamesEnum::NECKLACES->value      => $this->getMetalNecklace(),
            JewelleryCategoryNamesEnum::PENDANTS->value       => $this->getMetalPendant(),
            JewelleryCategoryNamesEnum::PIERCINGS->value      => $this->getMetalPiercing(),
            JewelleryCategoryNamesEnum::RINGS->value          => $this->getMetalRing($this->properties),
            JewelleryCategoryNamesEnum::TIE_CLIPS->value      => $this->getMetalTieClasp(),
        };
    }

    private function getPreciousMetal(): string
    {
        $enumClass = get_class(PreciousMetalNamesEnum::GOLDEN_RED);
        $enumCases = PreciousMetalNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getHallmark(string $metal): int
    {
        $cases = PreciousMetalNamesEnum::cases();
        dump($metal);

        $name = match ($metal) {
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::PALLADIUM->value,
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
            PreciousMetalNamesEnum::GOLDEN_WHITE->value,
            PreciousMetalNamesEnum::SILVER->value,
            PreciousMetalNamesEnum::PLATINUM->value => $this->selectCases($cases, [$metal])[0]->name,
        };

        $hallmarks = PreciousMetalNamesEnum::{$name}->hallmarks();

        return $hallmarks[array_rand($hallmarks)];
    }

    private function getMetalBead(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    private function getMetalBracelet(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    private function getMetalBrooch(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    private function getMetalChain(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    private function getMetalCharmPendant(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    private function getMetalCuffLink(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    private function getMetalEarring(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    private function getMetalNecklace(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    private function getMetalPendant(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    private function getMetalPiercing(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    protected function getMetalRing(array $properties): array
    {
        $specific = $properties['property']['ringSpecific'];
        $metal = $this->getPreciousMetal();

        if (in_array(RingSpecificNamesEnum::COMBINATION->value, $specific)) {
            return [
                [],
                []
            ];
        }

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    private function getMetalTieClasp(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

//    /**
//     * @throws RandomException
//     */
//    private function getCombinedGold(): array
//    {
//        $metals      = PreciousMetalNamesEnum::cases();
//        $combination = [];
//
//        foreach ($metals as $key => $metal) {
//            if ($metal->value === PreciousMetalNamesEnum::PLATINUM->value ||
//                $metal->value === PreciousMetalNamesEnum::PALLADIUM->value ||
//                $metal->value === PreciousMetalNamesEnum::SILVER->value) {
//
//                Arr::forget($metals, $key);
//            }
//        }
//
//        $randNum = random_int(1, 5);
//
//        if ($randNum === 1) {
//            $keys = array_rand($metals, 3);
//        } else {
//            $keys = array_rand($metals, 2);
//        }
//
//        $hallmark = $this->getHallmark($metals[0]->value);
//
//        foreach ($keys as $k => $key) {
//            $combination[$k] = [
//                'preciousMetal' => $metals[$key]->value,
//                'hallmark'      => $hallmark,
//            ];
//        }
//
//        return $combination;
//    }
//


//    private function getHallmark(string $preciousMetal): int
//    {
//        $enumClass = get_class(HallmarkNamesEnum::H_375);
//        $enumCases = HallmarkNamesEnum::cases();
//
//        foreach ($enumCases as $key => $case) {
//
//            if (!in_array($preciousMetal, $case::{$case->name}->metals()) ||
//                $case::{$case->name}->value === HallmarkNamesEnum::H_999->value) {
//                Arr::forget($enumCases, $key);
//            }
//
//            if ($preciousMetal === PreciousMetalNamesEnum::GOLDEN_RED->value &&
//                $case::{$case->name}->value === HallmarkNamesEnum::H_500->value) {
//                Arr::forget($enumCases, $key);
//            }
//
//            if ($preciousMetal === PreciousMetalNamesEnum::PLATINUM->value &&
//                $case::{$case->name}->value === HallmarkNamesEnum::H_585->value) {
//                Arr::forget($enumCases, $key);
//            }
//
//            if ($preciousMetal === PreciousMetalNamesEnum::PLATINUM->value &&
//                $case::{$case->name}->value === HallmarkNamesEnum::H_850->value) {
//                Arr::forget($enumCases, $key);
//            }
//        }
//
//        return $this->getArrElement($enumCases, $enumClass);
//    }


}
