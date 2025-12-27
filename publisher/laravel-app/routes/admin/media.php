<?php
declare(strict_types=1);

use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PictureController;
use App\Http\Admin\Media\MediaVideos\VideoDetails\Controllers\VideoDetailController;
use App\Http\Admin\Media\MediaVideos\VideoDetails\Controllers\VideoDetailsVideoRelatedController;
use App\Http\Admin\Media\MediaVideos\VideoDetails\Controllers\VideoDetailsVideoRelationshipController;
use App\Http\Admin\Media\MediaVideos\VideoDetails\Controllers\VideoDetailsVideoTypeRelatedController;
use App\Http\Admin\Media\MediaVideos\VideoDetails\Controllers\VideoDetailsVideoTypeRelationshipController;
use App\Http\Admin\Media\MediaVideos\Videos\Controllers\VideoController;
use App\Http\Admin\Media\MediaVideos\Videos\Controllers\VideosJewelleryRelatedController;
use App\Http\Admin\Media\MediaVideos\Videos\Controllers\VideosJewelleryRelationshipController;
use App\Http\Admin\Media\MediaVideos\Videos\Controllers\VideosProducerRelatedController;
use App\Http\Admin\Media\MediaVideos\Videos\Controllers\VideosProducerRelationshipController;
use App\Http\Admin\Media\MediaVideos\Videos\Controllers\VideoVideoDetailsRelatedController;
use App\Http\Admin\Media\MediaVideos\Videos\Controllers\VideoVideoDetailsRelationshipController;
use App\Http\Admin\Media\Shared\MediaTypes\Controllers\MediaTypeCatalogMediasRelatedController;
use App\Http\Admin\Media\Shared\MediaTypes\Controllers\MediaTypeCatalogMediasRelationshipController;
use App\Http\Admin\Media\Shared\MediaTypes\Controllers\MediaTypeController;
use App\Http\Admin\Media\Shared\MediaTypes\Controllers\MediaTypeReviewMediasRelatedController;
use App\Http\Admin\Media\Shared\MediaTypes\Controllers\MediaTypeReviewMediasRelationshipController;
use App\Http\Admin\Media\Shared\VideoTypes\Controllers\VideoTypeController;
use App\Http\Admin\Media\Shared\VideoTypes\Controllers\VideoTypeCatalogVideoDetailsRelatedController;
use App\Http\Admin\Media\Shared\VideoTypes\Controllers\VideoTypeCatalogVideoDetailsRelationshipController;
use App\Http\Admin\Media\Shared\VideoTypes\Controllers\VideoTypeReviewVideoDetailsRelatedController;
use App\Http\Admin\Media\Shared\VideoTypes\Controllers\VideoTypeReviewVideoDetailsRelationshipController;
use Domain\Medias\CatalogMedias\CatalogPictures\Enums\CatalogPictureNameRoutesEnum;
use Domain\Medias\MediaVideos\VideoDetails\Enums\VideoDetailNameRoutesEnum;
use Domain\Medias\MediaVideos\Videos\Enums\VideoNameRoutesEnum;
use Domain\Medias\Shared\MediaTypes\Enums\MediaTypeNameRoutesEnum;
use Domain\Medias\Shared\VideoTypes\Enums\VideoTypeNameRoutesEnum;

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
         ->name(MediaTypeNameRoutesEnum::RELATIONSHIP_TO_MEDIA_CATALOG->value);
    Route::get('media-types/{id}/media-catalogs', [MediaTypeCatalogMediasRelatedController::class, 'index'])
         ->name(MediaTypeNameRoutesEnum::RELATED_TO_MEDIA_CATALOGS->value);
    //  one-to-many Media Type to Media Reviews
    Route::get('media-types/{id}/relationships/media-reviews', [MediaTypeReviewMediasRelationshipController::class, 'index'])
         ->name(MediaTypeNameRoutesEnum::RELATIONSHIP_TO_MEDIA_REVIEWS->value);
    Route::get('media-types/{id}/media-reviews', [MediaTypeReviewMediasRelatedController::class, 'index'])
         ->name(MediaTypeNameRoutesEnum::RELATED_TO_MEDIA_REVIEWS->value);

    /*************************** JEWELLERY PICTURES *************************/
    // CRUD
    Route::get('jewellery-pictures', [PictureController::class, 'index'])->name(CatalogPictureNameRoutesEnum::CRUD_INDEX->value);
    Route::get('jewellery-pictures/{id}', [PictureController::class, 'show'])->name(CatalogPictureNameRoutesEnum::CRUD_SHOW->value);
    Route::post('jewellery-pictures', [PictureController::class, 'store'])->name(CatalogPictureNameRoutesEnum::CRUD_POST->value);
    Route::patch('jewellery-pictures/{id}', [PictureController::class, 'update'])->name(CatalogPictureNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('jewellery-pictures/{id}', [PictureController::class, 'destroy'])->name(CatalogPictureNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Pictures to Jewellery
//    Route::get('pictures/{id}/relationships/jewellery', [PicturesJewelleryRelationshipController::class, 'index'])
//        ->name(PictureNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
//    Route::get('pictures/{id}/jewellery', [PicturesJewelleryRelatedController::class, 'index'])
//        ->name(PictureNameRoutesEnum::RELATED_TO_JEWELLERY->value);
    //  many-to-one Pictures to Producer
//    Route::get('pictures/{id}/relationships/producer', [PicturesProducerRelationshipController::class, 'index'])
//        ->name(PictureNameRoutesEnum::RELATIONSHIP_TO_PRODUCER->value);
//    Route::get('pictures/{id}/producer', [PicturesProducerRelatedController::class, 'index'])
//        ->name(PictureNameRoutesEnum::RELATED_TO_PRODUCER->value);

    /*************************** VIDEOS *************************/
    // CRUD
    Route::get('videos', [VideoController::class, 'index'])->name(VideoNameRoutesEnum::CRUD_INDEX->value);
    Route::get('videos/{id}', [VideoController::class, 'show'])->name(VideoNameRoutesEnum::CRUD_SHOW->value);
    Route::post('videos', [VideoController::class, 'store'])->name(VideoNameRoutesEnum::CRUD_POST->value);
    Route::patch('videos/{id}', [VideoController::class, 'update'])->name(VideoNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('videos/{id}', [VideoController::class, 'destroy'])->name(VideoNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Video to Video Details
    Route::get('videos/{id}/relationships/video-details', [VideoVideoDetailsRelationshipController::class, 'index'])
        ->name(VideoNameRoutesEnum::RELATIONSHIP_TO_VIDEO_DETAILS->value);
    Route::get('videos/{id}/video-details', [VideoVideoDetailsRelatedController::class, 'index'])
        ->name(VideoNameRoutesEnum::RELATED_TO_VIDEO_DETAILS->value);
    //  many-to-one Videos to Producer
    Route::get('videos/{id}/relationships/producer', [VideosProducerRelationshipController::class, 'index'])
        ->name(VideoNameRoutesEnum::RELATIONSHIP_TO_PRODUCER->value);
    Route::get('videos/{id}/producer', [VideosProducerRelatedController::class, 'index'])
        ->name(VideoNameRoutesEnum::RELATED_TO_PRODUCER->value);
    //  many-to-one Videos to Jewellery
    Route::get('videos/{id}/relationships/jewellery', [VideosJewelleryRelationshipController::class, 'index'])
        ->name(VideoNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('videos/{id}/jewellery', [VideosJewelleryRelatedController::class, 'index'])
        ->name(VideoNameRoutesEnum::RELATED_TO_JEWELLERY->value);

    /*************************** VIDEO DETAILS *************************/
    // CRUD
    Route::get('video-details', [VideoDetailController::class, 'index'])->name(VideoDetailNameRoutesEnum::CRUD_INDEX->value);
    Route::get('video-details/{id}', [VideoDetailController::class, 'show'])->name(VideoDetailNameRoutesEnum::CRUD_SHOW->value);
    Route::post('video-details', [VideoDetailController::class, 'store'])->name(VideoDetailNameRoutesEnum::CRUD_POST->value);
    Route::patch('video-details/{id}', [VideoDetailController::class, 'update'])->name(VideoDetailNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('video-details/{id}', [VideoDetailController::class, 'destroy'])->name(VideoDetailNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Video Details to Video
    Route::get('video-details/{id}/relationships/video', [VideoDetailsVideoRelationshipController::class, 'index'])
        ->name(VideoDetailNameRoutesEnum::RELATIONSHIP_TO_VIDEO->value);
    Route::get('video-details/{id}/video', [VideoDetailsVideoRelatedController::class, 'index'])
        ->name(VideoDetailNameRoutesEnum::RELATED_TO_VIDEO->value);
    //  many-to-one Video Details to Video Type
    Route::get('video-details/{id}/relationships/video-type', [VideoDetailsVideoTypeRelationshipController::class, 'index'])
        ->name(VideoDetailNameRoutesEnum::RELATIONSHIP_TO_VIDEO_TYPE->value);
    Route::get('video-details/{id}/video-type', [VideoDetailsVideoTypeRelatedController::class, 'index'])
        ->name(VideoDetailNameRoutesEnum::RELATED_TO_VIDEO_TYPE->value);

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
