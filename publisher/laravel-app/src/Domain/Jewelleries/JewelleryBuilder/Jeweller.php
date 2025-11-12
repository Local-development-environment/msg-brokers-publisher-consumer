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
            ->addCategory()
            ->addMetalType()
            ->addHallmark()
            ->addGoldenColour()
            ->addCoveringType()
            ->addDescription()
            ->addPartNumber()
            ->addApproxWeight()
            ->addIsActive()
            ->addInsert()
            ->addProperty()
            ->addJewelleryName()
            ->addMedia()
            ->getJewellery()
            ;
    }
}
