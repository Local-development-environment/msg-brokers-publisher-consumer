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

    /**
     * @throws RandomException
     */
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
            JewelleryCategoryNamesEnum::TIE_CLIPS->value      => $this->getMetalTieClip(),
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

    /**
     * @throws RandomException
     */
    protected function getMetalRing(array $properties): array
    {
        $RingSpecific = $properties['property']['ringSpecific'];

        if (in_array(RingSpecificNamesEnum::COMBINATION->value, $RingSpecific)) {
            return $this->getGoldMetalCases();
        } else {
            $metal    = $this->getPreciousMetal();
            $hallmark = $this->getHallmark($metal);

            return [
                [
                    'preciousMetal' => $metal,
                    'hallmark'      => $hallmark
                ],
            ];
        }
    }

    private function getMetalTieClip(): array
    {
        $metal = $this->getPreciousMetal();

        return [
            [
                'preciousMetal' => $metal,
                'hallmark'      => $this->getHallmark($metal)
            ],
        ];
    }

    /**
     * @throws RandomException
     */
    private function getGoldMetalCases(): array
    {
        $goldCases = $this->selectCases(PreciousMetalNamesEnum::cases(), [
            PreciousMetalNamesEnum::GOLDEN_WHITE->value,
            PreciousMetalNamesEnum::GOLDEN_RED->value,
            PreciousMetalNamesEnum::GOLDEN_YELLOW->value,
        ]);

        $num      = rand(0, 5) === 0 ? 3 : 2;
        $randKeys = array_rand($goldCases, $num);

        $combinedMetals = [];
        foreach ($randKeys as $key => $randKey) {
            $combinedMetals[] = [
                'preciousMetal' => $goldCases[$randKey]->value,
                'hallmark'      => 585
            ];

        }
        return $combinedMetals;
    }
}
