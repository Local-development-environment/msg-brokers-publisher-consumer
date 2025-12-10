<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

final class Jeweller
{
    public function buildJewellery(JewelleryBuilderInterface $builder): array
    {
        return $builder
            ->reset()
            ->buildCategory()
            ->buildJewellery()
            ->buildMetal()
            ->buildInsert()
            ->buildProperty()
//            ->addJewelleryName()
//            ->addMedia()
            ->getJewellery()
            ;
    }
}
