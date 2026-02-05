<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Enums;

enum CatalogMediaNameRoutesEnum: string
{
    case CRUD_INDEX  = 'catalog-medias.index';
    case CRUD_SHOW   = 'catalog-medias.show';
    case CRUD_POST   = 'catalog-medias.post';
    case CRUD_PATCH  = 'catalog-medias.patch';
    case CRUD_DELETE = 'catalog-medias.delete';

    case RELATED_TO_JEWELLERY       = 'catalog-medias.jewellery';
    case RELATIONSHIP_TO_JEWELLERY  = 'catalog-medias.relationships.jewellery';
    case RELATED_TO_MEDIA_TYPE      = 'catalog-medias.media-type';
    case RELATIONSHIP_TO_MEDIA_TYPE = 'catalog-medias.relationships.media-type';
    case RELATED_TO_CATALOG_VIDEO      = 'catalog-media.catalog-video';
    case RELATIONSHIP_TO_CATALOG_VIDEO = 'catalog-media.relationships.catalog-video';
    case RELATED_TO_CATALOG_PICTURE      = 'catalog-medias.catalog-picture';
    case RELATIONSHIP_TO_CATALOG_PICTURE = 'catalog-medias.relationships.catalog-picture';
}
