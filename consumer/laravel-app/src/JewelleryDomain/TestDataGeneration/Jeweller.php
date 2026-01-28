<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration;

final class Jeweller
{
    public function buildJewellery(JewelleryGenerateInterface $builder): array
    {
        return $builder
            ->reset()
            ->buildJewelleryCategory()
            ->buildProperty()
            ->buildPreciousMetals()
            ->buildCoverages()
//            ->buildInsert()
            ->getJewellery();
    }
}
