<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

interface JewelleryBuilderInterface
{
    public function reset(): jewelleryBuilderInterface;
    public function addPrcsMetal(): jewelleryBuilderInterface;

    public function addPrcsMetalHallmark(): jewelleryBuilderInterface;

    public function addPrcsMetalColour(): jewelleryBuilderInterface;

    public function addCategory(): jewelleryBuilderInterface;

    public function addPrcsMetalCoverage(): jewelleryBuilderInterface;

    public function addWeight(): jewelleryBuilderInterface;

    public function addJewelleryName(): jewelleryBuilderInterface;

    public function addDescription(): jewelleryBuilderInterface;

    public function addPartNumber(): jewelleryBuilderInterface;

    public function addIsActive(): jewelleryBuilderInterface;

    public function addProperty(): jewelleryBuilderInterface;

    public function addInsert(): jewelleryBuilderInterface;

    public function getJewellery(): array;
}
