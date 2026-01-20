<?php
declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration;

interface PropertyGeneratorInterface
{
    public function getProps(): array;
}
