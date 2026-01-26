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
use Random\RandomException;

final class PreciousMetalGenerator
{
    use RandomArrayElementWithProbabilityTrait;

    /**
     * @throws RandomException
     */
    public function getPreciousMetals(array $properties): array
    {
        $preciousMetals = [];

        if ($properties['jewelleryCategory'] === JewelleryCategoryNamesEnum::RINGS->value) {

            if (!empty($properties['property']['ringSpecific']) && $properties['property']['ringSpecific'][0] === RingSpecificNamesEnum::COMBINATION->value) {
                $preciousMetals = $this->getCombinedGold();
            } else {
                $preciousMetals[] = $this->getSingleMetal();
            }

        } else {
            $preciousMetals[] = $this->getSingleMetal();
        }

        return $preciousMetals;
    }

    private function getSingleMetal(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            'preciousMetal' => $metal,
            'hallmark'      => $this->getHallmark($metal),
        ];
    }

    /**
     * @throws RandomException
     */
    private function getCombinedGold(): array
    {
        $metals      = PreciousMetalNamesEnum::cases();
        $combination = [];

        foreach ($metals as $key => $metal) {
            if ($metal->value === PreciousMetalNamesEnum::PLATINUM->value ||
                $metal->value === PreciousMetalNamesEnum::PALLADIUM->value ||
                $metal->value === PreciousMetalNamesEnum::SILVER->value) {

                Arr::forget($metals, $key);
            }
        }

        $randNum = random_int(1, 5);

        if ($randNum === 1) {
            $keys = array_rand($metals, 3);
        } else {
            $keys = array_rand($metals, 2);
        }

        $hallmark = $this->getHallmark($metals[0]->value);

        foreach ($keys as $k => $key) {
            $combination[$k] = [
                'preciousMetal' => $metals[$key]->value,
                'hallmark'      => $hallmark,
            ];
        }

        return $combination;
    }

    private function getPreciousMetal(): string
    {
        $enumClass = get_class(PreciousMetalNamesEnum::GOLDEN_RED);
        $enumCases = PreciousMetalNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }

    private function getHallmark(string $preciousMetal): int
    {
        $enumClass = get_class(HallmarkNamesEnum::H_375);
        $enumCases = HallmarkNamesEnum::cases();

        foreach ($enumCases as $key => $case) {

            if (!in_array($preciousMetal, $case::{$case->name}->metals()) ||
                $case::{$case->name}->value === HallmarkNamesEnum::H_999->value) {
                Arr::forget($enumCases, $key);
            }

            if ($preciousMetal === PreciousMetalNamesEnum::GOLDEN_RED->value &&
                $case::{$case->name}->value === HallmarkNamesEnum::H_500->value) {
                Arr::forget($enumCases, $key);
            }

            if ($preciousMetal === PreciousMetalNamesEnum::PLATINUM->value &&
                $case::{$case->name}->value === HallmarkNamesEnum::H_585->value) {
                Arr::forget($enumCases, $key);
            }

            if ($preciousMetal === PreciousMetalNamesEnum::PLATINUM->value &&
                $case::{$case->name}->value === HallmarkNamesEnum::H_850->value) {
                Arr::forget($enumCases, $key);
            }
        }

        return $this->getArrElement($enumCases, $enumClass);
    }
}
