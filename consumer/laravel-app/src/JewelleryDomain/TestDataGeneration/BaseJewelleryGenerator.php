<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration;

use JewelleryDomain\TestDataGeneration\CoverageItems\CoverageGenerator;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertGenerator;
use JewelleryDomain\TestDataGeneration\JewelleryCategories\JewelleryCategoryGenerator;
use JewelleryDomain\TestDataGeneration\PreciousMetals\PreciousMetalGenerator;
use JewelleryDomain\TestDataGeneration\Properties\Property;
use Random\RandomException;

final class BaseJewelleryGenerator implements JewelleryGenerateInterface
{
    protected \stdClass $baseJewellery;

    public function reset(): JewelleryGenerateInterface
    {
        $this->baseJewellery = new \stdClass();

        return $this;
    }

    public function buildJewelleryCategory(): JewelleryGenerateInterface
    {
        $jewelleryCategory = new JewelleryCategoryGenerator();

        $this->baseJewellery->jewelleryCategory = $jewelleryCategory->getCategory();

        return $this;
    }

    public function buildProperty(): JewelleryGenerateInterface
    {
        $property = new Property();

        $properties                    = get_object_vars($this->baseJewellery);
        $this->baseJewellery->property = $property->getProperties($properties);

        return $this;
    }

    /**
     * @throws RandomException
     */
    public function buildPreciousMetals(): JewelleryGenerateInterface
    {
        $properties                          = get_object_vars($this->baseJewellery);
        $preciousMetal = new PreciousMetalGenerator($properties);

        $this->baseJewellery->preciousMetals = $preciousMetal->getPreciousMetals();

        return $this;
    }

    /**
     * @throws RandomException
     */
    public function buildCoverages(): JewelleryGenerateInterface
    {
        $properties                     = get_object_vars($this->baseJewellery);
        $coverages = new CoverageGenerator($properties);
        $this->baseJewellery->coverages = $coverages->getCoverages($properties);

        return $this;
    }

    public function buildInsert(): JewelleryGenerateInterface
    {
        $inserts    = new InsertGenerator();
        $properties = get_object_vars($this->baseJewellery);

        $this->baseJewellery->inserts = $inserts->getInsert($properties);

        return $this;
    }

    public function getJewellery(): array
    {
        $jewellery['jewelleryCategory'] = $this->baseJewellery->jewelleryCategory;
        $jewellery ['specProperties']   = $this->baseJewellery->property;
        $jewellery['preciousMetals']    = $this->baseJewellery->preciousMetals;
        $jewellery['coverages']         = $this->baseJewellery->coverages;
        $jewellery['inserts']           = $this->baseJewellery->inserts;
//        $jewellery['jewelleryItem']  = $this->baseJewellery->jewelleryItem;
//        $jewellery['media']          = $this->baseJewellery->media;

        return $jewellery;
    }

}
