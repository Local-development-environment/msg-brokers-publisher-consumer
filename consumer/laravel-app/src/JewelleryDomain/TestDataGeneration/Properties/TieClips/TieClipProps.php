<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\TieClips;

use JewelleryDomain\Jewellery\SpecProperties\TieClips\TieClipType\Enums\TieClipTypeNameEnum;
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
            'tieClipType' => $this->getTieClipType(),
            'dimensions' => ['height' => random_int(5, 10), 'length' => random_int(30, 40)],
            'quantity' => random_int(0, 10),
        ];
    }

    private function getTieClipType(): string
    {
        $enumClass = get_class(TieClipTypeNameEnum::CLIP);
        $enumCases = TieClipTypeNameEnum::cases();

        return $this->getArrElement($enumCases, $enumClass);
    }
}
