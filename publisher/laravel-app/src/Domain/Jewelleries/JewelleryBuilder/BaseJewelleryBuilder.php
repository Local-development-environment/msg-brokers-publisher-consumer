<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

use Domain\Jewelleries\JewelleryBuilder\Properties\Category;
use Domain\Jewelleries\JewelleryBuilder\Properties\Colour;
use Domain\Jewelleries\JewelleryBuilder\Properties\Coverage;
use Domain\Jewelleries\JewelleryBuilder\Properties\Description;
use Domain\Jewelleries\JewelleryBuilder\Properties\Hallmark;
use Domain\Jewelleries\JewelleryBuilder\Properties\Insert;
use Domain\Jewelleries\JewelleryBuilder\Properties\IsActive;
use Domain\Jewelleries\JewelleryBuilder\Properties\JewelleryName;
use Domain\Jewelleries\JewelleryBuilder\Properties\PartNumber;
use Domain\Jewelleries\JewelleryBuilder\Properties\PrcsMetal;
use Domain\Jewelleries\JewelleryBuilder\Properties\Property;
use Domain\Jewelleries\JewelleryBuilder\Properties\Weight;
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
        $this->baseJewellery->weight = (new Weight())->getWeight();

        return $this;
    }

    public function addJewelleryName(): jewelleryBuilderInterface
    {
        $name = $this->baseJewellery->category . ' ' . $this->baseJewellery->prcsMetal . ' ' .
            $this->baseJewellery->prcsMetalHallmark . ' проба цвет ' . $this->baseJewellery->prcsMetalColour . ' артикул ' .
            $this->baseJewellery->partNumber . ' вес ' . $this->baseJewellery->weight . ' гр.';

        $this->baseJewellery->jewelleryName = (new JewelleryName())->getJewelleryName($name);

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
        $this->baseJewellery->isActive = (new IsActive())->getIsActive();

        return $this;
    }

    public function addProperty(): jewelleryBuilderInterface
    {
        $this->baseJewellery->property = (new Property())
            ->getProperties(
                $this->baseJewellery->category, $this->baseJewellery->prcsMetal, $this->baseJewellery->insert
            );

        return $this;
    }

    /**
     * @throws RandomException
     */
    public function addInsert(): jewelleryBuilderInterface
    {
        $this->baseJewellery->insert = (new Insert())->getInsert($this->baseJewellery->category);

        return $this;
    }

    public function getJewellery(): array
    {
        $jewellery['prcs_metal_prop']['prcs_metal'] = $this->baseJewellery->prcsMetal;
        $jewellery['prcs_metal_prop']['prcs_metal_hallmark'] = $this->baseJewellery->prcsMetalHallmark;
        $jewellery['prcs_metal_prop']['prcs_metal_colour'] = $this->baseJewellery->prcsMetalColour;
        $jewellery['jw_category'] = $this->baseJewellery->category;
        $jewellery['jw_coverage'] = $this->baseJewellery->prcsMetalCoverage;
        $jewellery['name'] = $this->baseJewellery->jewelleryName;
        $jewellery['description'] = $this->baseJewellery->description;
        $jewellery['part_number'] = $this->baseJewellery->partNumber;
        $jewellery['approx_weight'] = $this->baseJewellery->weight;
        $jewellery['is_active'] = $this->baseJewellery->isActive;
        $jewellery['props'] = $this->baseJewellery->property;
        $jewellery['jw_jewellery'] = $this->baseJewellery->insert;

        return $jewellery;
    }
}
