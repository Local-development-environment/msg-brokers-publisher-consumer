<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryGenerator\Jewelleries\ApproxWeight;
use Domain\JewelleryGenerator\Jewelleries\Category;
use Domain\JewelleryGenerator\Jewelleries\Coverings\Covering;
use Domain\JewelleryGenerator\Jewelleries\Coverings\CoveringFunction;
use Domain\JewelleryGenerator\Jewelleries\Coverings\CoveringShade;
use Domain\JewelleryGenerator\Jewelleries\Coverings\CoveringType;
use Domain\JewelleryGenerator\Jewelleries\Description;
use Domain\JewelleryGenerator\Jewelleries\Inserts\Insert;
use Domain\JewelleryGenerator\Jewelleries\IsActive;
use Domain\JewelleryGenerator\Jewelleries\JewelleryItem;
use Domain\JewelleryGenerator\Jewelleries\JewelleryName;
use Domain\JewelleryGenerator\Jewelleries\Medias\Media;
use Domain\JewelleryGenerator\Jewelleries\Metals\ColourCombination;
use Domain\JewelleryGenerator\Jewelleries\Metals\GoldenColour;
use Domain\JewelleryGenerator\Jewelleries\Metals\Hallmark;
use Domain\JewelleryGenerator\Jewelleries\Metals\Metal;
use Domain\JewelleryGenerator\Jewelleries\Metals\MetalHallmark;
use Domain\JewelleryGenerator\Jewelleries\Metals\MetalType;
use Domain\JewelleryGenerator\Jewelleries\PartNumber;
use Domain\JewelleryGenerator\Jewelleries\Properties\Property;
use Random\RandomException;

final class BaseJewelleryBuilder implements JewelleryBuilderInterface
{
    protected \stdClass $baseJewellery;

    public function reset(): jewelleryBuilderInterface
    {
        $this->baseJewellery = new \stdClass();

        return $this;
    }

    public function buildCategory(): jewelleryBuilderInterface
    {
        $category = new Category();
        $this->baseJewellery->categoryId = $category->getCategory()->id;
        $this->baseJewellery->categoryName = $category->getCategory()->name;
        $this->baseJewellery->categoryDescription = $category->getCategory()->description;

        return $this;
    }

    /**
     * @throws RandomException
     */
    public function buildJewellery(): jewelleryBuilderInterface
    {
        $approxWeight = new ApproxWeight();
        $description = new Description();
        $isActive = new IsActive();
        $partNumber = new PartNumber();

        $this->baseJewellery->approxWeight = $approxWeight->getApproxWeight();
        $this->baseJewellery->description = $description->getDescription();
        $this->baseJewellery->isActive = $isActive->getIsActive();
        $this->baseJewellery->partNumber = $partNumber->getPartNumber();

        return $this;
    }

    /**
     * @throws RandomException
     */
    public function buildMetal(): jewelleryBuilderInterface
    {
        $metalType         = new MetalType();
        $hallmark          = new Hallmark();
        $goldenColour      = new GoldenColour();
        $metalHallmark     = new MetalHallmark();
        $metal             = new Metal();
        $colourCombination = new ColourCombination();

        $metalTypeData = $metalType->getMetalType();

        $this->baseJewellery->metalTypeId = $metalTypeData->id;
        $this->baseJewellery->metalTypeName = $metalTypeData->name;
        $this->baseJewellery->metalTypeDescription = $metalTypeData->description;

        $hallmarkData = $hallmark->getHallmark($this->baseJewellery->metalTypeName);

        $this->baseJewellery->hallmarkId = $hallmarkData->id;
        $this->baseJewellery->hallmarkValue = $hallmarkData->value;
        $this->baseJewellery->hallmarkDescription = $hallmarkData->description;

        $goldenColourData = $goldenColour->getGoldenColour($this->baseJewellery->metalTypeName);

        $this->baseJewellery->goldenColourId = $goldenColourData;

        $metalHallmarkData = $metalHallmark
            ->getMetalHallmark($this->baseJewellery->metalTypeId, $this->baseJewellery->hallmarkId);

        $this->baseJewellery->metalHallmark = $metalHallmarkData;

        return $this;
    }

    /**
     * @throws \Exception
     */
    public function buildCovering(): jewelleryBuilderInterface
    {
        $coveringType     = new CoveringType();
        $coveringShade    = new CoveringShade();
        $coveringFunction = new CoveringFunction();
        $covering         = new Covering();

        $coveringTypeData = $coveringType->getCoveringType($this->baseJewellery);
        $this->baseJewellery->coveringType = $coveringTypeData;
//        $coveringShadeData = $coveringShade->getCoveringShade($this->baseJewellery->coveringType);

        return $this;
    }

//    public function addCoveringType(): jewelleryBuilderInterface
//    {
//        $properties = get_object_vars($this->baseJewellery);
//        $covering = new CoveringType();
//        $this->baseJewellery->coveringType = $covering->getCoveringType($properties);
//
//        return $this;
//    }
//
//    public function addCoveringShade(): jewelleryBuilderInterface
//    {
//        $properties = get_object_vars($this->baseJewellery);
//        $covering = new CoveringShade();
//        $this->baseJewellery->coveringShade = $covering->getCoveringShade($properties);
//
//        return $this;
//    }

    /**
     * @throws RandomException
     */
    public function addInsert(): jewelleryBuilderInterface
    {
        $insert = new Insert();
        $this->baseJewellery->insert = $insert->getInsert($this->baseJewellery->category);

        return $this;
    }

    public function addProperty(): jewelleryBuilderInterface
    {
        $property = new Property();

        $properties = get_object_vars($this->baseJewellery);
        $this->baseJewellery->property = $property->getProperties($properties);

        return $this;
    }

    public function addJewelleryName(): jewelleryBuilderInterface
    {
        $properties = get_object_vars($this->baseJewellery);
        $jewelleryName = new JewelleryName();

        $this->baseJewellery->jewelleryName = $jewelleryName->getJewelleryName($properties);

        return $this;
    }

    public function addMedia(): jewelleryBuilderInterface
    {
        $media = new Media();
        $this->baseJewellery->media = $media->getMedia();

        return $this;
    }

    public function getJewellery(): array
    {
        $jewellery['category']['id'] = $this->baseJewellery->categoryId;
        $jewellery['category']['name'] = $this->baseJewellery->categoryName;
        $jewellery['category']['description'] = $this->baseJewellery->categoryDescription;

        $jewellery['metals']['metalType']['id'] = $this->baseJewellery->metalTypeId;
        $jewellery['metals']['metalType']['name'] = $this->baseJewellery->metalTypeName;
        $jewellery['metals']['metalType']['description'] = $this->baseJewellery->metalTypeDescription;
        $jewellery['metals']['hallmark']['id'] = $this->baseJewellery->hallmarkId;
        $jewellery['metals']['hallmark']['value'] = $this->baseJewellery->hallmarkValue;
        $jewellery['metals']['hallmark']['description'] = $this->baseJewellery->hallmarkDescription;
        $jewellery['metals']['goldenColour'] = $this->baseJewellery->goldenColourId;

        $jewellery['jewellery']['categoryId'] = $this->baseJewellery->categoryId;
        $jewellery['jewellery']['name'] = $this->baseJewellery->categoryName;
        $jewellery['jewellery']['approxWeight'] = $this->baseJewellery->approxWeight;
        $jewellery['jewellery']['description'] = $this->baseJewellery->description;
        $jewellery['jewellery']['partNumber'] = $this->baseJewellery->partNumber;
        $jewellery['jewellery']['isActive'] = $this->baseJewellery->isActive;

        $jewellery['covering']['coveringType'] = $this->baseJewellery->coveringType;
//        $jewellery['covering']['covering_shade'] = $this->baseJewellery->coveringShade;
//        $jewellery['name'] = $this->baseJewellery->jewelleryName;
//        $jewellery['description'] = $this->baseJewellery->description;
//        $jewellery['part_number'] = $this->baseJewellery->partNumber;
//        $jewellery['approx_weight'] = $this->baseJewellery->approxWeight;
//        $jewellery['is_active'] = $this->baseJewellery->isActive;
//        $jewellery['inserts'] = $this->baseJewellery->insert;
//        $jewellery['props'] = $this->baseJewellery->property;
//        $jewellery['jw_media'] = $this->baseJewellery->media;

        return $jewellery;
    }
}
