<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideos\Enums;

enum CatalogVideoNameRoutesEnum: string
{
    case CRUD_INDEX  = 'catalog-videos.index';
    case CRUD_SHOW   = 'catalog-videos.show';
    case CRUD_POST   = 'catalog-videos.post';
    case CRUD_PATCH  = 'catalog-videos.patch';
    case CRUD_DELETE = 'catalog-videos.delete';

    case RELATED_TO_CATALOG_MEDIA              = 'catalog-video.catalog-media';
    case RELATIONSHIP_TO_CATALOG_MEDIA         = 'catalog-video.relationships.catalog-media';
    case RELATED_TO_CATALOG_VIDEO_DETAILS      = 'catalog-video.catalog-video-details';
    case RELATIONSHIP_TO_CATALOG_VIDEO_DETAILS = 'catalog-video.relationships.catalog-video-details';
}
