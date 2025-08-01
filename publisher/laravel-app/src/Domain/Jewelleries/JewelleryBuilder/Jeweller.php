<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

final class Jeweller
{
    public function buildJewellery(JewelleryBuilderInterface $builder): array
    {
        return $builder
            ->addCategory()
            ->addPrcsMetal()
            ->addPrcsMetalSample()
            ->addPrcsMetalCoverage()
            ->addPrcsMetalColour()
            ->addDescription()
            ->addPartNumber()
            ->addWeight()
            ->addJewelleryName()
            ->addIsActive()
            ->addProperty()
            ->addInsert()
            ->getJewellery()
            ;
    }
}
