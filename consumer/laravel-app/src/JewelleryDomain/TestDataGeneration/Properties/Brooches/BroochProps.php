<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration\Properties\Brooches;

use JewelleryDomain\TestDataGeneration\PropertyGeneratorInterface;
use JewelleryDomain\TestDataGeneration\Traits\RandomArrayElementWithProbabilityTrait;
use JewelleryDomain\TestDataGeneration\Traits\SpecPropertyTrait;
use Random\RandomException;

final readonly class BroochProps implements PropertyGeneratorInterface
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
//        $specProps = [];
//
//        $specProps['nameFunction']       = $this->getNameFunction($this->properties['jewelleryCategory']);
//        $specProps['metric']['quantity'] = random_int(0, 10);
//        $specProps['dimensions']         = [
//            'height' => random_int(20, 50),
//            'width'  => random_int(10, 30),
//        ];
//
//        return $specProps;
        return $this->getSharedSpecProperties();
    }
}
