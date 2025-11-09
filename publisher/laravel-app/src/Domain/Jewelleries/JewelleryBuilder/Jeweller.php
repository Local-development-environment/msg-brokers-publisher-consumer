<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

use Domain\JewelleryGenerator\JewelleryBuilderInterface;

final class Jeweller
{
    public function buildJewellery(JewelleryBuilderInterface $builder): array
    {
        return $builder
            ->reset()
            ->addPrcsMetal()
            ->addPrcsMetalHallmark()
            ->addCategory()
            ->addPrcsMetalCoverage()
            ->addPrcsMetalColour()
            ->addDescription()
            ->addPartNumber()
            ->addWeight()
            ->addIsActive()
//            ->addCategory()
            ->addInsert()
            ->addProperty()
            ->addJewelleryName()
            ->addMedia()
            ->getJewellery()
            ;
    }
}
