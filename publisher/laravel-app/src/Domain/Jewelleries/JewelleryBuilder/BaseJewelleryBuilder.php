<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

use Domain\Jewelleries\JewelleryBuilder\Properties\Category;

final class BaseJewelleryBuilder implements JewelleryBuilderInterface
{
    protected \stdClass $baseJewellery;

    public function reset(): void
    {
        $this->baseJewellery = new \stdClass();
    }

    public function addPrcsMetal(): jewelleryBuilderInterface
    {
        // TODO: Implement addPrcsMetal() method.
    }

    public function addPrcsMetalSample(): jewelleryBuilderInterface
    {
        // TODO: Implement addPrcsMetalSample() method.
    }

    public function addPrcsMetalColour(): jewelleryBuilderInterface
    {
        // TODO: Implement addPrcsMetalColour() method.
    }

    public function addCategory(): jewelleryBuilderInterface
    {
        $this->reset();
        $this->baseJewellery->category = (new Category())->getCategory();

        return $this;
    }

    public function addPrcsMetalCoverage(): jewelleryBuilderInterface
    {
        // TODO: Implement addPrcsMetalCoverage() method.
    }

    public function addWeight(): jewelleryBuilderInterface
    {
        // TODO: Implement addWeight() method.
    }

    public function addJewelleryName(): jewelleryBuilderInterface
    {
        // TODO: Implement addJewelleryName() method.
    }

    public function addDescription(): jewelleryBuilderInterface
    {
        // TODO: Implement addDescription() method.
    }

    public function addPartNumber(): jewelleryBuilderInterface
    {
        // TODO: Implement addPartNumber() method.
    }

    public function addIsActive(): jewelleryBuilderInterface
    {
        // TODO: Implement addIsActive() method.
    }

    public function addProperty(): jewelleryBuilderInterface
    {
        // TODO: Implement addProperty() method.
    }

    public function addInsert(): jewelleryBuilderInterface
    {
        // TODO: Implement addInsert() method.
    }

    public function getJewellery(): array
    {
        // TODO: Implement getJewellery() method.
    }
}
