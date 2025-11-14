<?php

declare(strict_types=1);

namespace Domain\Jewelleries\JewelleryBuilder;

use Domain\Jewelleries\JewelleryBuilder\Properties\Insert;
use Domain\Jewelleries\JewelleryBuilder\Properties\Media;
use Domain\Jewelleries\JewelleryBuilder\Properties\Property;
use Domain\JewelleryGenerator\Jewelleries\ApproxWeight;
use Domain\JewelleryGenerator\Jewelleries\Category;
use Domain\JewelleryGenerator\Jewelleries\Coverings\CoveringShade;
use Domain\JewelleryGenerator\Jewelleries\Coverings\CoveringType;
use Domain\JewelleryGenerator\Jewelleries\Description;
use Domain\JewelleryGenerator\Jewelleries\IsActive;
use Domain\JewelleryGenerator\Jewelleries\JewelleryName;
use Domain\JewelleryGenerator\Jewelleries\PartNumber;
use Domain\JewelleryGenerator\Jewelleries\PreciousMetals\GoldenColour;
use Domain\JewelleryGenerator\Jewelleries\PreciousMetals\Hallmark;
use Domain\JewelleryGenerator\Jewelleries\PreciousMetals\MetalType;
use Domain\JewelleryGenerator\JewelleryBuilderInterface;
use Random\RandomException;

final class BaseJewelleryBuilder implements JewelleryBuilderInterface
{
    protected \stdClass $baseJewellery;

    public function reset(): jewelleryBuilderInterface
    {
        $this->baseJewellery = new \stdClass();

        return $this;
    }

    public function addCategory(): jewelleryBuilderInterface
    {
        $category = new Category();
        $this->baseJewellery->category = $category->getCategory();

        return $this;
    }

    public function addMetalType(): jewelleryBuilderInterface
    {
        $metal = new MetalType();
        $this->baseJewellery->metalType = $metal->getMetalType();

        return $this;
    }

    public function addHallmark(): jewelleryBuilderInterface
    {
        $hallmark = new Hallmark();
        $this->baseJewellery->hallmark = $hallmark->getHallmark($this->baseJewellery->metalType);

        return $this;
    }

    /**
     * @throws RandomException
     */
    public function addGoldenColour(): jewelleryBuilderInterface
    {
        $colour = new GoldenColour();
        $this->baseJewellery->goldenColour = $colour
            ->getGoldenColour($this->baseJewellery->hallmark, $this->baseJewellery->metalType);

        return $this;
    }

    public function addCoveringType(): jewelleryBuilderInterface
    {
        $properties = get_object_vars($this->baseJewellery);
        $covering = new CoveringType();
        $this->baseJewellery->coveringType = $covering->getCoveringType($properties);

        return $this;
    }

    public function addCoveringShade(): jewelleryBuilderInterface
    {
        $properties = get_object_vars($this->baseJewellery);
        $covering = new CoveringShade();
        $this->baseJewellery->coveringShade = $covering->getCoveringShade($properties);

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

    public function addApproxWeight(): jewelleryBuilderInterface
    {
        $weight = new ApproxWeight();
        $this->baseJewellery->approxWeight = $weight->getApproxWeight();

        return $this;
    }

    public function addIsActive(): jewelleryBuilderInterface
    {
        $isActive = new IsActive();
        $this->baseJewellery->isActive = $isActive->getIsActive();

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
        $jewellery['metal_props']['metal_type'] = $this->baseJewellery->metalType;
        $jewellery['metal_props']['hallmark'] = $this->baseJewellery->hallmark;
        $jewellery['metal_props']['golden_colour'] = $this->baseJewellery->goldenColour;
        $jewellery['category'] = $this->baseJewellery->category;
        $jewellery['covering']['covering_type'] = $this->baseJewellery->coveringType;
        $jewellery['covering']['covering_shade'] = $this->baseJewellery->coveringShade;
        $jewellery['name'] = $this->baseJewellery->jewelleryName;
        $jewellery['description'] = $this->baseJewellery->description;
        $jewellery['part_number'] = $this->baseJewellery->partNumber;
        $jewellery['approx_weight'] = $this->baseJewellery->approxWeight;
        $jewellery['is_active'] = $this->baseJewellery->isActive;
        $jewellery['inserts'] = $this->baseJewellery->insert;
        $jewellery['props'] = $this->baseJewellery->property;
        $jewellery['jw_media'] = $this->baseJewellery->media;

        return $jewellery;
    }
}
