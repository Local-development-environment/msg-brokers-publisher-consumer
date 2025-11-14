<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

interface JewelleryBuilderInterface
{
    public function reset(): jewelleryBuilderInterface;

    public function addCategory(): jewelleryBuilderInterface;

    public function addMetalType(): jewelleryBuilderInterface;

    public function addHallmark(): jewelleryBuilderInterface;

    public function addGoldenColour(): jewelleryBuilderInterface;

    public function addCoveringType(): jewelleryBuilderInterface;

    public function addCoveringShade(): jewelleryBuilderInterface;

    public function addDescription(): jewelleryBuilderInterface;

    public function addPartNumber(): jewelleryBuilderInterface;

    public function addApproxWeight(): jewelleryBuilderInterface;

    public function addIsActive(): jewelleryBuilderInterface;

    public function addInsert(): jewelleryBuilderInterface;

    public function addProperty(): jewelleryBuilderInterface;

    public function addJewelleryName(): jewelleryBuilderInterface;

    public function addMedia(): jewelleryBuilderInterface;

    public function getJewellery(): array;
}
