<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\PreciousMetals;

use Illuminate\Support\Arr;
use JewelleryDomain\Jewellery\PreciousMetalItems\Hallmark\Enums\HallmarkNamesEnum;
use JewelleryDomain\Jewellery\PreciousMetalItems\PreciousMetal\Enums\PreciousMetalNamesEnum;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;

final class PreciousMetalGenerator
{
    use RandomArrayElementWithProbabilityTrait;

    public function getPreciousMetals(string $jewelleryCategory): array
    {
        $preciousMetals = [];

        $preciousMetal = $this->getPreciousMetal();
        $hallmark      = $this->getHallmark($preciousMetal);

        $preciousMetals[] = [
            'hallmark'      => $hallmark,
            'preciousMetal' => $preciousMetal
        ];

        if ($preciousMetal === PreciousMetalNamesEnum::GOLDEN_RED->value ||
            $preciousMetal === PreciousMetalNamesEnum::GOLDEN_WHITE->value ||
            $preciousMetal === PreciousMetalNamesEnum::GOLDEN_YELLOW->value) {

            if (rand(0, 9) === 0) {
                $combinedGold = $this->getCombinedGold($preciousMetal);

                $preciousMetals[] = [
                    'hallmark'      => $hallmark,
                    'preciousMetal' => $combinedGold
                ];
            }
        }

        return $preciousMetals;
    }

    private function getCombinedGold(string $preciousMetal): string
    {
        $metals = PreciousMetalNamesEnum::cases();

        foreach ($metals as $key => $metal) {
            if ($metal->value === $preciousMetal) {
                Arr::forget($metals, $key);
            } elseif ($metal->value === PreciousMetalNamesEnum::PLATINUM->value ||
                $metal->value === PreciousMetalNamesEnum::PALLADIUM->value ||
                $metal->value === PreciousMetalNamesEnum::SILVER->value) {
                Arr::forget($metals, $key);
            }
        }

        $enumClass = get_class(PreciousMetalNamesEnum::GOLDEN_RED);
        $enumCases = $metals;

        return $this->getArrElement($enumCases, $enumClass);
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
