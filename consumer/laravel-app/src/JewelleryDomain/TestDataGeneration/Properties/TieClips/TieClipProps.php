<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\TieClips;

use JewelleryDomain\Jewellery\SpecProperties\TieClips\TieClipType\Enums\TieClipTypeNamesEnum;
use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class TieClipProps implements PropertyGeneratorInterface
{
    use RandomArrayElementWithProbabilityTrait;
    use SpecPropertyTrait;

    public function __construct(private array $properties)
    {
    }

    /**
     * @throws RandomException
     */
    public function getProps(): array
    {
        return [
            'nameFunction' => $this->getNameFunction($this->properties['jewelleryCategory']),
            'tieClipType' => $this->getTieClipType(),
            'dimensions' => ['height' => rand(5, 10), 'length' => rand(30, 40)],
            'quantity' => rand(0, 10),
        ];
    }

    private function getTieClipType(): string
    {
        $enumClass = get_class(TieClipTypeNamesEnum::CLIP);
        $enumCases = TieClipTypeNamesEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
