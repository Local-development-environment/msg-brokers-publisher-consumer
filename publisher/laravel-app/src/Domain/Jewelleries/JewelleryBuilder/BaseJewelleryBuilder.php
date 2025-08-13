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

    public function reset(): jewelleryBuilderInterface
    {
        $this->baseJewellery = new \stdClass();

        return $this;
    }

    public function addPrcsMetal(): jewelleryBuilderInterface
    {
        $metal = new PrcsMetal();
        $this->baseJewellery->prcsMetal = $metal->getMetal();

        return $this;
    }

    public function addPrcsMetalHallmark(): jewelleryBuilderInterface
    {
        $hallmark = new Hallmark();
        $this->baseJewellery->prcsMetalHallmark = $hallmark->getHallmark($this->baseJewellery->prcsMetal);

        return $this;
    }

    public function addPrcsMetalColour(): jewelleryBuilderInterface
    {
        $colour = new Colour();
        $this->baseJewellery->prcsMetalColour = $colour
            ->getColour($this->baseJewellery->prcsMetal, $this->baseJewellery->prcsMetalCoverage);

        return $this;
    }

    public function addCategory(): jewelleryBuilderInterface
    {
        $category = new Category();
        $this->baseJewellery->category = $category->getCategory();

        return $this;
    }

    public function addPrcsMetalCoverage(): jewelleryBuilderInterface
    {
        $coverage = new Coverage();
        $this->baseJewellery->prcsMetalCoverage = $coverage->getCoverages($this->baseJewellery->prcsMetal);

        return $this;
    }

    public function addWeight(): jewelleryBuilderInterface
    {
        $weight = new Weight();
        $this->baseJewellery->weight = $weight->getWeight();

        return $this;
    }

    public function addJewelleryName(): jewelleryBuilderInterface
    {
        $properties = get_object_vars($this->baseJewellery);
        $jewelleryName = new JewelleryName();

        $this->baseJewellery->jewelleryName = $jewelleryName->getJewelleryName($properties);

        return $this;
    }

    public function addDescription(): jewelleryBuilderInterface
    {
        $description = new Description();
        $this->baseJewellery->description = $description->getDescription();

        return $this;
    }

    /**
     * @throws RandomException
     */
    public function addPartNumber(): jewelleryBuilderInterface
    {
        $partNumber = new PartNumber();
        $this->baseJewellery->partNumber = $partNumber->getPartNumber();

        return $this;
    }

    public function addIsActive(): jewelleryBuilderInterface
    {
        $isActive = new IsActive();
        $this->baseJewellery->isActive = $isActive->getIsActive();

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
        $insert = new Insert();
        $this->baseJewellery->insert = $insert->getInsert($this->baseJewellery->category);

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
