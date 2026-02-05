<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogPictures\Enums;

enum CatalogPictureNameRoutesEnum: string
{
    case CRUD_INDEX              = 'catalog-pictures.index';
    case CRUD_SHOW               = 'catalog-pictures.show';
    case CRUD_POST               = 'catalog-pictures.post';
    case CRUD_PATCH              = 'catalog-pictures.patch';
    case CRUD_DELETE             = 'catalog-pictures.delete';

    case RELATED_TO_CATALOG_MEDIA      = 'catalog-picture.catalog-media';
    case RELATIONSHIP_TO_CATALOG_MEDIA = 'catalog-picture.relationships.catalog-media';
}
