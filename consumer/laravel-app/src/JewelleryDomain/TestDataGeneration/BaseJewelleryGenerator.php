<?php

declare(strict_types=1);

namespace JewelleryDomain\TestDataGeneration;

use JewelleryDomain\TestDataGeneration\CoverageItems\CoverageGenerator;
use JewelleryDomain\TestDataGeneration\InsertItems\InsertGenerator;
use JewelleryDomain\TestDataGeneration\JewelleryCategories\JewelleryCategoryGenerator;
use JewelleryDomain\TestDataGeneration\PreciousMetals\PreciousMetalGenerator;
use JewelleryDomain\TestDataGeneration\Properties\Property;

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

    public function buildPreciousMetals(): JewelleryGenerateInterface
    {
        $preciousMetal = new PreciousMetalGenerator();

        $this->baseJewellery->preciousMetals = $preciousMetal->getPreciousMetals($this->baseJewellery->jewelleryCategory);

        return $this;
    }

    public function buildCoverages(): JewelleryGenerateInterface
    {
        $coverages = new CoverageGenerator();

        $properties                     = get_object_vars($this->baseJewellery);
        $this->baseJewellery->coverages = $coverages->getCoverages($properties);

        return $this;
    }

//    public function buildInsert(): JewelleryGenerateInterface
//    {
//        $inserts = new InsertGenerator();
//        $properties = get_object_vars($this->baseJewellery);
//
//        $this->baseJewellery->inserts = $inserts->getInsert($properties);
//    }

    public function getJewellery(): array
    {
        $jewellery['jewelleryCategory'] = $this->baseJewellery->jewelleryCategory;
        $jewellery ['specProperties']   = $this->baseJewellery->property;
        $jewellery['preciousMetals']    = $this->baseJewellery->preciousMetals;
        $jewellery['coverages']         = $this->baseJewellery->coverages;
//        $jewellery['inserts']     = $this->baseJewellery->inserts;
//        $jewellery['jewelleryItem']  = $this->baseJewellery->jewelleryItem;
//        $jewellery['media']          = $this->baseJewellery->media;

        return $jewellery;
    }

}
