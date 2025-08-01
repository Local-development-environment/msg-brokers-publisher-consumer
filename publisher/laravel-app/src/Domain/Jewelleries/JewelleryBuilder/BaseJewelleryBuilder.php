<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

use Domain\Jewelleries\JewelleryBuilder\Properties\Category;
use Domain\Jewelleries\JewelleryBuilder\Properties\Colour;
use Domain\Jewelleries\JewelleryBuilder\Properties\Coverage;
use Domain\Jewelleries\JewelleryBuilder\Properties\Description;
use Domain\Jewelleries\JewelleryBuilder\Properties\Hallmark;
use Domain\Jewelleries\JewelleryBuilder\Properties\PartNumber;
use Domain\Jewelleries\JewelleryBuilder\Properties\PrcsMetal;
use Random\RandomException;

final class BaseJewelleryBuilder implements JewelleryBuilderInterface
{
    protected \stdClass $baseJewellery;

    public function reset(): void
    {
        $this->baseJewellery = new \stdClass();
    }

    public function addPrcsMetal(): jewelleryBuilderInterface
    {
        $metal = new PrcsMetal();
        $this->baseJewellery->prcsMetal = $metal->getMetal();

        return $this;
    }

    public function addPrcsMetalHallmark(): jewelleryBuilderInterface
    {
        $this->baseJewellery->prcsMetalHallmark = (new Hallmark())->getHallmark($this->baseJewellery->prcsMetal);

        return $this;
    }

    public function addPrcsMetalColour(): jewelleryBuilderInterface
    {
        $this->baseJewellery->prcsMetalColour = (new Colour())
            ->getColour($this->baseJewellery->prcsMetal, $this->baseJewellery->prcsMetalCoverage);

        return $this;
    }

    public function addCategory(): jewelleryBuilderInterface
    {
        $this->reset();
        $this->baseJewellery->category = (new Category())->getCategory();

        return $this;
    }

    public function addPrcsMetalCoverage(): jewelleryBuilderInterface
    {
        $this->baseJewellery->prcsMetalCoverage = (new Coverage())->getCoverages($this->baseJewellery->prcsMetal);

        return $this;
    }

    public function addWeight(): jewelleryBuilderInterface
    {
        return $this;
    }

    public function addJewelleryName(): jewelleryBuilderInterface
    {
        return $this;
    }

    public function addDescription(): jewelleryBuilderInterface
    {
        $this->baseJewellery->description = (new Description())->getDescription();

        return $this;
    }

    /**
     * @throws RandomException
     */
    public function addPartNumber(): jewelleryBuilderInterface
    {
        $this->baseJewellery->partNumber = (new PartNumber())->getPartNumber();

        return $this;
    }

    public function addIsActive(): jewelleryBuilderInterface
    {
        return $this;
    }

    public function addProperty(): jewelleryBuilderInterface
    {
        return $this;
    }

    public function addInsert(): jewelleryBuilderInterface
    {
        return $this;
    }

    public function getJewellery(): array
    {
        $jewellery['prcs_metal_prop']['prcs_metal'] = $this->baseJewellery->prcsMetal;
        $jewellery['prcs_metal_prop']['prcs_metal_hallmark'] = $this->baseJewellery->prcsMetalHallmark;
        $jewellery['prcs_metal_prop']['prcs_metal_colour'] = $this->baseJewellery->prcsMetalColour;
        $jewellery['jw_category'] = $this->baseJewellery->category;
        $jewellery['jw_coverage'] = $this->baseJewellery->prcsMetalCoverage;
//        $jewellery['name'] = $this->baseJewellery->jewelleryName;
        $jewellery['description'] = $this->baseJewellery->description;
        $jewellery['part_number'] = $this->baseJewellery->partNumber;
//        $jewellery['approx_weight'] = $this->baseJewellery->weight;
//        $jewellery['is_active'] = $this->baseJewellery->isActive;
//        $jewellery['props'] = $this->baseJewellery->property;
//        $jewellery['insert_jewellery'] = $this->baseJewellery->insert;

        return $jewellery;
    }
}
