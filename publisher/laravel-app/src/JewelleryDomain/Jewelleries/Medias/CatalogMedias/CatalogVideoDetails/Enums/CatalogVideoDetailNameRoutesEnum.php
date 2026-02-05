<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideoDetails\Enums;

enum CatalogVideoDetailNameRoutesEnum: string
{
    case CRUD_INDEX  = 'catalog-video-details.index';
    case CRUD_SHOW   = 'catalog-video-details.show';
    case CRUD_POST   = 'catalog-video-details.post';
    case CRUD_PATCH  = 'catalog-video-details.patch';
    case CRUD_DELETE = 'catalog-video-details.delete';

    case RELATED_TO_CATALOG_VIDEO      = 'catalog-video-details.catalog-video';
    case RELATIONSHIP_TO_CATALOG_VIDEO = 'catalog-video-details.relationships.catalog-video';
    case RELATED_TO_VIDEO_TYPE         = 'catalog-video-details.video-type';
    case RELATIONSHIP_TO_VIDEO_TYPE    = 'catalog-video-details.relationships.video-type';
}
