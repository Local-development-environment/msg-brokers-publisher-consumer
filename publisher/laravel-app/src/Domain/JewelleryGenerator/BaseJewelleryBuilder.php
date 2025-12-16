<?php

declare(strict_types=1);

namespace Domain\JewelleryGenerator;

use Domain\JewelleryGenerator\Jewelleries\Categories\Category;
use Domain\JewelleryGenerator\Jewelleries\InsertItems\InsertItem;
use Domain\JewelleryGenerator\Jewelleries\JewelleryItems\JewelleryItem;
use Domain\JewelleryGenerator\Jewelleries\Medias\Media;
use Domain\JewelleryGenerator\Jewelleries\MetalItems\MetalItem;
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

        $this->baseJewellery->category = $category->getCategory();

        return $this;
    }

    public function buildMetal(): jewelleryBuilderInterface
    {
        $metalItem = new MetalItem();

        $this->baseJewellery->metalItem = $metalItem->metalItem($this->baseJewellery->category);

        return $this;
    }

    public function buildInsert(): jewelleryBuilderInterface
    {
        $insert                          = new InsertItem();
        $this->baseJewellery->insertItem = $insert->getInsert($this->baseJewellery->category);

        return $this;
    }

    public function buildProperty(): jewelleryBuilderInterface
    {
        $property = new Property();

        $properties                    = get_object_vars($this->baseJewellery);
        $this->baseJewellery->property = $property->getProperties($properties);

        return $this;
    }

    /**
     * @throws RandomException
     */
    public function buildJewellery(): jewelleryBuilderInterface
    {
        $properties    = get_object_vars($this->baseJewellery);
        $jewelleryItem = new JewelleryItem();

        $this->baseJewellery->jewelleryItem = $jewelleryItem->jewelleryItem($properties);

        return $this;
    }

    public function buildMedia(): jewelleryBuilderInterface
    {
        $media                      = new Media();
        $this->baseJewellery->media = $media->getMedia();

        return $this;
    }

    public function getJewellery(): array
    {
        $jewellery['category']       = $this->baseJewellery->category;
        $jewellery['jewelleryItem']  = $this->baseJewellery->jewelleryItem;
        $jewellery['preciousMetals'] = $this->baseJewellery->metalItem['preciousMetals'];
        $jewellery['coverages']      = $this->baseJewellery->metalItem['coverages'];
        //        $jewellery['insertItem']     = $this->baseJewellery->insertItem;
        //        $jewellery['property']       = $this->baseJewellery->property;
        //        $jewellery['media']          = $this->baseJewellery->media;

        return $jewellery;
    }
}
