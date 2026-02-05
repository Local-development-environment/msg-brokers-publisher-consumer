<?php
declare(strict_types=1);

use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Controllers\CatalogMediaCatalogPictureRelatedController;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Controllers\CatalogMediaCatalogPictureRelationshipController;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Controllers\CatalogMediaCatalogVideoRelatedController;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Controllers\CatalogMediaCatalogVideoRelationshipController;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Controllers\CatalogMediaController;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Controllers\CatalogMediasJewelleryRelatedController;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Controllers\CatalogMediasJewelleryRelationshipController;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Controllers\CatalogMediasMediaTypeRelatedController;
use App\Http\Admin\Media\CatalogMedias\CatalogMedias\Controllers\CatalogMediasMediaTypeRelationshipController;
use App\Http\Admin\Media\CatalogMedias\CatalogPictures\Controllers\CatalogPictureCatalogMediaRelatedController;
use App\Http\Admin\Media\CatalogMedias\CatalogPictures\Controllers\CatalogPictureCatalogMediaRelationshipController;
use App\Http\Admin\Media\CatalogMedias\CatalogPictures\Controllers\CatalogPictureController;
use App\Http\Admin\Media\CatalogMedias\CatalogVideoDetails\Controllers\CatalogVideoDetailController;
use App\Http\Admin\Media\CatalogMedias\CatalogVideoDetails\Controllers\CatalogVideoDetailsCatalogVideoRelatedController;
use App\Http\Admin\Media\CatalogMedias\CatalogVideoDetails\Controllers\CatalogVideoDetailsCatalogVideoRelationshipController;
use App\Http\Admin\Media\CatalogMedias\CatalogVideoDetails\Controllers\CatalogVideoDetailsVideoTypeRelatedController;
use App\Http\Admin\Media\CatalogMedias\CatalogVideoDetails\Controllers\CatalogVideoDetailsVideoTypeRelationshipController;
use App\Http\Admin\Media\CatalogMedias\CatalogVideos\Controllers\CatalogVideoCatalogMediaRelatedController;
use App\Http\Admin\Media\CatalogMedias\CatalogVideos\Controllers\CatalogVideoCatalogMediaRelationshipController;
use App\Http\Admin\Media\CatalogMedias\CatalogVideos\Controllers\CatalogVideoCatalogVideoDetailsRelatedController;
use App\Http\Admin\Media\CatalogMedias\CatalogVideos\Controllers\CatalogVideoCatalogVideoDetailsRelationshipController;
use App\Http\Admin\Media\CatalogMedias\CatalogVideos\Controllers\CatalogVideoController;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Controllers\ReviewMediaController;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Controllers\ReviewMediaReviewPictureRelatedController;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Controllers\ReviewMediaReviewPictureRelationshipController;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Controllers\ReviewMediaReviewVideoRelatedController;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Controllers\ReviewMediaReviewVideoRelationshipController;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Controllers\ReviewMediasJewelleryRelatedController;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Controllers\ReviewMediasJewelleryRelationshipController;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Controllers\ReviewMediasMediaTypeRelatedController;
use App\Http\Admin\Media\ReviewMedias\ReviewMedias\Controllers\ReviewMediasMediaTypeRelationshipController;
use App\Http\Admin\Media\ReviewMedias\ReviewPictures\Controllers\ReviewPictureController;
use App\Http\Admin\Media\ReviewMedias\ReviewPictures\Controllers\ReviewPictureReviewMediaRelatedController;
use App\Http\Admin\Media\ReviewMedias\ReviewPictures\Controllers\ReviewPictureReviewMediaRelationshipController;
use App\Http\Admin\Media\ReviewMedias\ReviewVideoDetails\Controllers\ReviewVideoDetailController;
use App\Http\Admin\Media\ReviewMedias\ReviewVideoDetails\Controllers\ReviewVideoDetailsReviewVideoRelatedController;
use App\Http\Admin\Media\ReviewMedias\ReviewVideoDetails\Controllers\ReviewVideoDetailsReviewVideoRelationshipController;
use App\Http\Admin\Media\ReviewMedias\ReviewVideoDetails\Controllers\ReviewVideoDetailsVideoTypeRelatedController;
use App\Http\Admin\Media\ReviewMedias\ReviewVideoDetails\Controllers\ReviewVideoDetailsVideoTypeRelationshipController;
use App\Http\Admin\Media\ReviewMedias\ReviewVideos\Controllers\ReviewVideoController;
use App\Http\Admin\Media\ReviewMedias\ReviewVideos\Controllers\ReviewVideoReviewMediaRelatedController;
use App\Http\Admin\Media\ReviewMedias\ReviewVideos\Controllers\ReviewVideoReviewMediaRelationshipController;
use App\Http\Admin\Media\ReviewMedias\ReviewVideos\Controllers\ReviewVideoReviewVideoDetailsRelatedController;
use App\Http\Admin\Media\ReviewMedias\ReviewVideos\Controllers\ReviewVideoReviewVideoDetailsRelationshipController;
use App\Http\Admin\Media\Shared\MediaTypes\Controllers\MediaTypeCatalogMediasRelatedController;
use App\Http\Admin\Media\Shared\MediaTypes\Controllers\MediaTypeCatalogMediasRelationshipController;
use App\Http\Admin\Media\Shared\MediaTypes\Controllers\MediaTypeController;
use App\Http\Admin\Media\Shared\MediaTypes\Controllers\MediaTypeReviewMediasRelatedController;
use App\Http\Admin\Media\Shared\MediaTypes\Controllers\MediaTypeReviewMediasRelationshipController;
use App\Http\Admin\Media\Shared\VideoTypes\Controllers\VideoTypeCatalogVideoDetailsRelatedController;
use App\Http\Admin\Media\Shared\VideoTypes\Controllers\VideoTypeCatalogVideoDetailsRelationshipController;
use App\Http\Admin\Media\Shared\VideoTypes\Controllers\VideoTypeController;
use App\Http\Admin\Media\Shared\VideoTypes\Controllers\VideoTypeReviewVideoDetailsRelatedController;
use App\Http\Admin\Media\Shared\VideoTypes\Controllers\VideoTypeReviewVideoDetailsRelationshipController;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogMedias\Enums\CatalogMediaNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogPictures\Enums\CatalogPictureNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideoDetails\Enums\CatalogVideoDetailNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\CatalogMedias\CatalogVideos\Enums\CatalogVideoNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewMedias\Enums\ReviewMediaNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewPictures\Enums\ReviewPictureNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideoDetails\Enums\ReviewVideoDetailNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\ReviewMedias\ReviewVideos\Enums\ReviewVideoNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\MediaTypes\Enums\MediaTypeNameRoutesEnum;
use JewelleryDomain\Jewelleries\Medias\Shared\VideoTypes\Enums\VideoTypeNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {

    /*************************** MEDIA TYPES *************************/
    // CRUD
    Route::get('media-types', [MediaTypeController::class, 'index'])->name(MediaTypeNameRoutesEnum::CRUD_INDEX->value);
    Route::get('media-types/{id}', [MediaTypeController::class, 'show'])->name(MediaTypeNameRoutesEnum::CRUD_SHOW->value);
    Route::post('media-types', [MediaTypeController::class, 'store'])->name(MediaTypeNameRoutesEnum::CRUD_POST->value);
    Route::patch('media-types/{id}', [MediaTypeController::class, 'update'])->name(MediaTypeNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('media-types/{id}', [MediaTypeController::class, 'destroy'])->name(MediaTypeNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Media Type to Media Catalogs
    Route::get('media-types/{id}/relationships/media-catalogs', [MediaTypeCatalogMediasRelationshipController::class, 'index'])
         ->name(MediaTypeNameRoutesEnum::RELATIONSHIP_TO_CATALOG_MEDIAS->value);
    Route::get('media-types/{id}/media-catalogs', [MediaTypeCatalogMediasRelatedController::class, 'index'])
         ->name(MediaTypeNameRoutesEnum::RELATED_TO_CATALOG_MEDIAS->value);
    //  one-to-many Media Type to Media Reviews
    Route::get('media-types/{id}/relationships/media-reviews', [MediaTypeReviewMediasRelationshipController::class, 'index'])
         ->name(MediaTypeNameRoutesEnum::RELATIONSHIP_TO_REVIEW_MEDIAS->value);
    Route::get('media-types/{id}/media-reviews', [MediaTypeReviewMediasRelatedController::class, 'index'])
         ->name(MediaTypeNameRoutesEnum::RELATED_TO_REVIEW_MEDIAS->value);

    /*************************** CATALOG MEDIAS *************************/
    // CRUD
    Route::get('catalog-medias', [CatalogMediaController::class, 'index'])->name(CatalogMediaNameRoutesEnum::CRUD_INDEX->value);
    Route::get('catalog-medias/{id}', [CatalogMediaController::class, 'show'])->name(CatalogMediaNameRoutesEnum::CRUD_SHOW->value);
    Route::post('catalog-medias', [CatalogMediaController::class, 'store'])->name(CatalogMediaNameRoutesEnum::CRUD_POST->value);
    Route::patch('catalog-medias/{id}', [CatalogMediaController::class, 'update'])->name(CatalogMediaNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('catalog-medias/{id}', [CatalogMediaController::class, 'destroy'])->name(CatalogMediaNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Catalog Medias to Jewellery
    Route::get('catalog-medias/{id}/relationships/jewellery', [CatalogMediasJewelleryRelationshipController::class, 'index'])
         ->name(CatalogMediaNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('catalog-medias/{id}/jewellery', [CatalogMediasJewelleryRelatedController::class, 'index'])
         ->name(CatalogMediaNameRoutesEnum::RELATED_TO_JEWELLERY->value);
    //  many-to-one Catalog Medias to Media Type
    Route::get('catalog-medias/{id}/relationships/media-type', [CatalogMediasMediaTypeRelationshipController::class, 'index'])
         ->name(CatalogMediaNameRoutesEnum::RELATIONSHIP_TO_MEDIA_TYPE->value);
    Route::get('catalog-medias/{id}/media-type', [CatalogMediasMediaTypeRelatedController::class, 'index'])
         ->name(CatalogMediaNameRoutesEnum::RELATED_TO_MEDIA_TYPE->value);
    //  many-to-one Catalog Medias to Catalog Video
    Route::get('catalog-medias/{id}/relationships/catalog-video', [CatalogMediaCatalogVideoRelationshipController::class, 'index'])
         ->name(CatalogMediaNameRoutesEnum::RELATIONSHIP_TO_CATALOG_VIDEO->value);
    Route::get('catalog-medias/{id}/catalog-video', [CatalogMediaCatalogVideoRelatedController::class, 'index'])
         ->name(CatalogMediaNameRoutesEnum::RELATED_TO_CATALOG_VIDEO->value);
    //  many-to-one Catalog Medias to Catalog Picture
    Route::get('catalog-medias/{id}/relationships/catalog-picture', [CatalogMediaCatalogPictureRelationshipController::class, 'index'])
         ->name(CatalogMediaNameRoutesEnum::RELATIONSHIP_TO_CATALOG_PICTURE->value);
    Route::get('catalog-medias/{id}/catalog-picture', [CatalogMediaCatalogPictureRelatedController::class, 'index'])
         ->name(CatalogMediaNameRoutesEnum::RELATED_TO_CATALOG_PICTURE->value);

    /*************************** REVIEW MEDIAS *************************/
    // CRUD
    Route::get('review-medias', [ReviewMediaController::class, 'index'])->name(ReviewMediaNameRoutesEnum::CRUD_INDEX->value);
    Route::get('review-medias/{id}', [ReviewMediaController::class, 'show'])->name(ReviewMediaNameRoutesEnum::CRUD_SHOW->value);
    Route::post('review-medias', [ReviewMediaController::class, 'store'])->name(ReviewMediaNameRoutesEnum::CRUD_POST->value);
    Route::patch('review-medias/{id}', [ReviewMediaController::class, 'update'])->name(ReviewMediaNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('review-medias/{id}', [ReviewMediaController::class, 'destroy'])->name(ReviewMediaNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Review Medias to Jewellery
    Route::get('review-medias/{id}/relationships/jewellery', [ReviewMediasJewelleryRelationshipController::class, 'index'])
         ->name(ReviewMediaNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('review-medias/{id}/jewellery', [ReviewMediasJewelleryRelatedController::class, 'index'])
         ->name(ReviewMediaNameRoutesEnum::RELATED_TO_JEWELLERY->value);
    //  many-to-one Review Medias to Media Type
    Route::get('review-medias/{id}/relationships/media-type', [ReviewMediasMediaTypeRelationshipController::class, 'index'])
         ->name(ReviewMediaNameRoutesEnum::RELATIONSHIP_TO_MEDIA_TYPE->value);
    Route::get('review-medias/{id}/media-type', [ReviewMediasMediaTypeRelatedController::class, 'index'])
         ->name(ReviewMediaNameRoutesEnum::RELATED_TO_MEDIA_TYPE->value);
    //  many-to-one Review Medias to Review Video
    Route::get('review-medias/{id}/relationships/catalog-video', [ReviewMediaReviewVideoRelationshipController::class, 'index'])
         ->name(ReviewMediaNameRoutesEnum::RELATIONSHIP_TO_REVIEW_VIDEO->value);
    Route::get('review-medias/{id}/catalog-video', [ReviewMediaReviewVideoRelatedController::class, 'index'])
         ->name(ReviewMediaNameRoutesEnum::RELATED_TO_REVIEW_VIDEO->value);
    //  many-to-one Review Medias to Review Picture
    Route::get('review-medias/{id}/relationships/catalog-picture', [ReviewMediaReviewPictureRelationshipController::class, 'index'])
         ->name(ReviewMediaNameRoutesEnum::RELATIONSHIP_TO_REVIEW_PICTURE->value);
    Route::get('review-medias/{id}/catalog-picture', [ReviewMediaReviewPictureRelatedController::class, 'index'])
         ->name(ReviewMediaNameRoutesEnum::RELATED_TO_REVIEW_PICTURE->value);

    /*************************** CATALOG PICTURES *************************/
    // CRUD
    Route::get('catalog-pictures', [CatalogPictureController::class, 'index'])->name(CatalogPictureNameRoutesEnum::CRUD_INDEX->value);
    Route::get('catalog-pictures/{id}', [CatalogPictureController::class, 'show'])->name(CatalogPictureNameRoutesEnum::CRUD_SHOW->value);
    Route::post('catalog-pictures', [CatalogPictureController::class, 'store'])->name(CatalogPictureNameRoutesEnum::CRUD_POST->value);
    Route::patch('catalog-pictures/{id}', [CatalogPictureController::class, 'update'])->name(CatalogPictureNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('catalog-pictures/{id}', [CatalogPictureController::class, 'destroy'])->name(CatalogPictureNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Catalog Picture to Catalog Media
    Route::get('catalog-pictures/{id}/relationships/catalog-media', [CatalogPictureCatalogMediaRelationshipController::class, 'index'])
        ->name(CatalogPictureNameRoutesEnum::RELATIONSHIP_TO_CATALOG_MEDIA->value);
    Route::get('catalog-pictures/{id}/catalog-media', [CatalogPictureCatalogMediaRelatedController::class, 'index'])
        ->name(CatalogPictureNameRoutesEnum::RELATED_TO_CATALOG_MEDIA->value);

    /*************************** CATALOG VIDEOS *************************/
    // CRUD
    Route::get('catalog-videos', [CatalogVideoController::class, 'index'])->name(CatalogVideoNameRoutesEnum::CRUD_INDEX->value);
    Route::get('catalog-videos/{id}', [CatalogVideoController::class, 'show'])->name(CatalogVideoNameRoutesEnum::CRUD_SHOW->value);
    Route::post('catalog-videos', [CatalogVideoController::class, 'store'])->name(CatalogVideoNameRoutesEnum::CRUD_POST->value);
    Route::patch('catalog-videos/{id}', [CatalogVideoController::class, 'update'])->name(CatalogVideoNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('catalog-videos/{id}', [CatalogVideoController::class, 'destroy'])->name(CatalogVideoNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Catalog Video to Catalog Media
    Route::get('catalog-videos/{id}/relationships/catalog-media', [CatalogVideoCatalogMediaRelationshipController::class, 'index'])
         ->name(CatalogVideoNameRoutesEnum::RELATIONSHIP_TO_CATALOG_MEDIA->value);
    Route::get('catalog-videos/{id}/catalog-media', [CatalogVideoCatalogMediaRelatedController::class, 'index'])
         ->name(CatalogVideoNameRoutesEnum::RELATED_TO_CATALOG_MEDIA->value);
    //  one-to-many Catalog Video to Catalog Video Details
    Route::get('catalog-videos/{id}/relationships/catalog-video-details', [CatalogVideoCatalogVideoDetailsRelationshipController::class, 'index'])
         ->name(CatalogVideoNameRoutesEnum::RELATIONSHIP_TO_CATALOG_VIDEO_DETAILS->value);
    Route::get('catalog-videos/{id}/catalog-video-details', [CatalogVideoCatalogVideoDetailsRelatedController::class, 'index'])
         ->name(CatalogVideoNameRoutesEnum::RELATED_TO_CATALOG_VIDEO_DETAILS->value);

    /*************************** CATALOG VIDEO DETAILS *************************/
    // CRUD
    Route::get('catalog-video-details', [CatalogVideoDetailController::class, 'index'])->name(CatalogVideoDetailNameRoutesEnum::CRUD_INDEX->value);
    Route::get('catalog-video-details/{id}', [CatalogVideoDetailController::class, 'show'])->name(CatalogVideoDetailNameRoutesEnum::CRUD_SHOW->value);
    Route::post('catalog-video-details', [CatalogVideoDetailController::class, 'store'])->name(CatalogVideoDetailNameRoutesEnum::CRUD_POST->value);
    Route::patch('catalog-video-details/{id}', [CatalogVideoDetailController::class, 'update'])->name(CatalogVideoDetailNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('catalog-video-details/{id}', [CatalogVideoDetailController::class, 'destroy'])->name(CatalogVideoDetailNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Catalog Video Details to Catalog Video
    Route::get('catalog-video-details/{id}/relationships/catalog-video', [CatalogVideoDetailsCatalogVideoRelationshipController::class, 'index'])
         ->name(CatalogVideoDetailNameRoutesEnum::RELATIONSHIP_TO_CATALOG_VIDEO->value);
    Route::get('catalog-video-details/{id}/catalog-video', [CatalogVideoDetailsCatalogVideoRelatedController::class, 'index'])
         ->name(CatalogVideoDetailNameRoutesEnum::RELATED_TO_CATALOG_VIDEO->value);
    //  many-to-one Catalog Video Details to Video Type
    Route::get('catalog-video-details/{id}/relationships/video-type', [CatalogVideoDetailsVideoTypeRelationshipController::class, 'index'])
         ->name(CatalogVideoDetailNameRoutesEnum::RELATIONSHIP_TO_VIDEO_TYPE->value);
    Route::get('catalog-video-details/{id}/video-type', [CatalogVideoDetailsVideoTypeRelatedController::class, 'index'])
         ->name(CatalogVideoDetailNameRoutesEnum::RELATED_TO_VIDEO_TYPE->value);

    /*************************** REVIEW PICTURES *************************/
    // CRUD
    Route::get('review-pictures', [ReviewPictureController::class, 'index'])->name(ReviewPictureNameRoutesEnum::CRUD_INDEX->value);
    Route::get('review-pictures/{id}', [ReviewPictureController::class, 'show'])->name(ReviewPictureNameRoutesEnum::CRUD_SHOW->value);
    Route::post('review-pictures', [ReviewPictureController::class, 'store'])->name(ReviewPictureNameRoutesEnum::CRUD_POST->value);
    Route::patch('review-pictures/{id}', [ReviewPictureController::class, 'update'])->name(ReviewPictureNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('review-pictures/{id}', [ReviewPictureController::class, 'destroy'])->name(ReviewPictureNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Review Pictures to Review Media
    Route::get('review-pictures/{id}/relationships/review-media', [ReviewPictureReviewMediaRelationshipController::class, 'index'])
         ->name(ReviewPictureNameRoutesEnum::RELATIONSHIP_TO_REVIEW_MEDIA->value);
    Route::get('review-pictures/{id}/review-media', [ReviewPictureReviewMediaRelatedController::class, 'index'])
         ->name(ReviewPictureNameRoutesEnum::RELATED_TO_REVIEW_MEDIA->value);

    /*************************** REVIEW VIDEOS *************************/
    // CRUD
    Route::get('review-videos', [ReviewVideoController::class, 'index'])->name(ReviewVideoNameRoutesEnum::CRUD_INDEX->value);
    Route::get('review-videos/{id}', [ReviewVideoController::class, 'show'])->name(ReviewVideoNameRoutesEnum::CRUD_SHOW->value);
    Route::post('review-videos', [ReviewVideoController::class, 'store'])->name(ReviewVideoNameRoutesEnum::CRUD_POST->value);
    Route::patch('review-videos/{id}', [ReviewVideoController::class, 'update'])->name(ReviewVideoNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('review-videos/{id}', [ReviewVideoController::class, 'destroy'])->name(ReviewVideoNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Review Video to Review Media
    Route::get('review-videos/{id}/relationships/review-media', [ReviewVideoReviewMediaRelationshipController::class, 'index'])
         ->name(ReviewVideoNameRoutesEnum::RELATIONSHIP_TO_REVIEW_MEDIA->value);
    Route::get('review-videos/{id}/review-media', [ReviewVideoReviewMediaRelatedController::class, 'index'])
         ->name(ReviewVideoNameRoutesEnum::RELATED_TO_REVIEW_MEDIA->value);
    //  one-to-many Review Video to Review Video Details
    Route::get('review-videos/{id}/relationships/review-video-details', [ReviewVideoReviewVideoDetailsRelationshipController::class, 'index'])
         ->name(ReviewVideoNameRoutesEnum::RELATIONSHIP_TO_REVIEW_VIDEO_DETAILS->value);
    Route::get('review-videos/{id}/review-video-details', [ReviewVideoReviewVideoDetailsRelatedController::class, 'index'])
         ->name(ReviewVideoNameRoutesEnum::RELATED_TO_REVIEW_VIDEO_DETAILS->value);

    /*************************** REVIEW VIDEO DETAILS *************************/
    // CRUD
    Route::get('review-video-details', [ReviewVideoDetailController::class, 'index'])->name(ReviewVideoDetailNameRoutesEnum::CRUD_INDEX->value);
    Route::get('review-video-details/{id}', [ReviewVideoDetailController::class, 'show'])->name(ReviewVideoDetailNameRoutesEnum::CRUD_SHOW->value);
    Route::post('review-video-details', [ReviewVideoDetailController::class, 'store'])->name(ReviewVideoDetailNameRoutesEnum::CRUD_POST->value);
    Route::patch('review-video-details/{id}', [ReviewVideoDetailController::class, 'update'])->name(ReviewVideoDetailNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('review-video-details/{id}', [ReviewVideoDetailController::class, 'destroy'])->name(ReviewVideoDetailNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Review Video Details to Review Video
    Route::get('review-video-details/{id}/relationships/review-video', [ReviewVideoDetailsReviewVideoRelationshipController::class, 'index'])
        ->name(ReviewVideoDetailNameRoutesEnum::RELATIONSHIP_TO_REVIEW_VIDEO->value);
    Route::get('review-video-details/{id}/review-video', [ReviewVideoDetailsReviewVideoRelatedController::class, 'index'])
        ->name(ReviewVideoDetailNameRoutesEnum::RELATED_TO_REVIEW_VIDEO->value);
    //  many-to-one Review Video Details to Video Type
    Route::get('review-video-details/{id}/relationships/video-type', [ReviewVideoDetailsVideoTypeRelationshipController::class, 'index'])
        ->name(ReviewVideoDetailNameRoutesEnum::RELATIONSHIP_TO_VIDEO_TYPE->value);
    Route::get('review-video-details/{id}/video-type', [ReviewVideoDetailsVideoTypeRelatedController::class, 'index'])
        ->name(ReviewVideoDetailNameRoutesEnum::RELATED_TO_VIDEO_TYPE->value);

    /*************************** VIDEO TYPES *************************/
    // CRUD
    Route::get('video-types', [VideoTypeController::class, 'index'])->name(VideoTypeNameRoutesEnum::CRUD_INDEX->value);
    Route::get('video-types/{id}', [VideoTypeController::class, 'show'])->name(VideoTypeNameRoutesEnum::CRUD_SHOW->value);
    Route::post('video-types', [VideoTypeController::class, 'store'])->name(VideoTypeNameRoutesEnum::CRUD_POST->value);
    Route::patch('video-types/{id}', [VideoTypeController::class, 'update'])->name(VideoTypeNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('video-types/{id}', [VideoTypeController::class, 'destroy'])->name(VideoTypeNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Video Type to Catalog Video Details
    Route::get('video-types/{id}/relationships/catalog-video-details', [VideoTypeCatalogVideoDetailsRelationshipController::class, 'index'])
        ->name(VideoTypeNameRoutesEnum::RELATIONSHIP_TO_CATALOG_VIDEO_DETAILS->value);
    Route::get('video-types/{id}/catalog-video-details', [VideoTypeCatalogVideoDetailsRelatedController::class, 'index'])
        ->name(VideoTypeNameRoutesEnum::RELATED_TO_CATALOG_VIDEO_DETAILS->value);
    //  one-to-many Video Type to Review Video Details
    Route::get('video-types/{id}/relationships/review-video-details', [VideoTypeReviewVideoDetailsRelationshipController::class, 'index'])
         ->name(VideoTypeNameRoutesEnum::RELATIONSHIP_TO_REVIEW_VIDEO_DETAILS->value);
    Route::get('video-types/{id}/review-video-details', [VideoTypereviewVideoDetailsRelatedController::class, 'index'])
         ->name(VideoTypeNameRoutesEnum::RELATED_TO_REVIEW_VIDEO_DETAILS->value);
});
