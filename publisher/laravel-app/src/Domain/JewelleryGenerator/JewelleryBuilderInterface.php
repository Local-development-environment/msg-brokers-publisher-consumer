<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;

interface JewelleryBuilderInterface
{
    public function reset(): jewelleryBuilderInterface;

    public function buildCategory(): jewelleryBuilderInterface;

    public function buildJewellery(): jewelleryBuilderInterface;

    public function buildMetal(): jewelleryBuilderInterface;

    public function buildInsert(): jewelleryBuilderInterface;

    public function buildProperty(): jewelleryBuilderInterface;

//    public function addJewelleryName(): jewelleryBuilderInterface;

    public function addMedia(): jewelleryBuilderInterface;

    public function getJewellery(): array;
}
