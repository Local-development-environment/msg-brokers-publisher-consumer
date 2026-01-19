<?php

namespace JewelleryDomain\TestDataGeneration;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;

interface JewelleryGenerateInterface
{
    public function reset(): JewelleryGenerateInterface;
    public function buildJewelleryCategory(): JewelleryGenerateInterface;
    public function buildPreciousMetals(): JewelleryGenerateInterface;
    public function buildCoverages(): JewelleryGenerateInterface;
    public function getJewellery(): array;
}
