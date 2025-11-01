<?php
declare(strict_types=1);

use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PictureController;
use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PicturesJewelleryRelatedController;
use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PicturesJewelleryRelationshipController;
use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PicturesProducerRelatedController;
use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PicturesProducerRelationshipController;
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
use App\Http\Admin\Media\MediaVideos\VideoTypes\Controllers\VideoTypeController;
use App\Http\Admin\Media\MediaVideos\VideoTypes\Controllers\VideoTypeVideoDetailsRelatedController;
use App\Http\Admin\Media\MediaVideos\VideoTypes\Controllers\VideoTypeVideoDetailsRelationshipController;
use App\Http\Admin\Media\Producers\Controllers\ProducerController;
use App\Http\Admin\Media\Producers\Controllers\ProducerPicturesRelatedController;
use App\Http\Admin\Media\Producers\Controllers\ProducerPicturesRelationshipController;
use App\Http\Admin\Media\Producers\Controllers\ProducerVideosRelatedController;
use App\Http\Admin\Media\Producers\Controllers\ProducerVideosRelationshipController;
use Domain\Medias\MediaPictures\Pictures\Enums\PictureNameRoutesEnum;
use Domain\Medias\MediaVideos\VideoDetails\Enums\VideoDetailNameRoutesEnum;
use Domain\Medias\MediaVideos\Videos\Enums\VideoNameRoutesEnum;
use Domain\Medias\MediaVideos\VideoTypes\Enums\VideoTypeNameRoutesEnum;
use Domain\Medias\Shared\Producers\Enums\ProducerNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {
    /*************************** PICTURES *************************/
    // CRUD
    Route::get('pictures', [PictureController::class, 'index'])->name(PictureNameRoutesEnum::CRUD_INDEX->value);
    Route::get('pictures/{id}', [PictureController::class, 'show'])->name(PictureNameRoutesEnum::CRUD_SHOW->value);
    Route::post('pictures', [PictureController::class, 'store'])->name(PictureNameRoutesEnum::CRUD_POST->value);
    Route::patch('pictures/{id}', [PictureController::class, 'update'])->name(PictureNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('pictures/{id}', [PictureController::class, 'destroy'])->name(PictureNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Pictures to Jewellery
    Route::get('pictures/{id}/relationships/jewellery', [PicturesJewelleryRelationshipController::class, 'index'])
        ->name(PictureNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('pictures/{id}/jewellery', [PicturesJewelleryRelatedController::class, 'index'])
        ->name(PictureNameRoutesEnum::RELATED_TO_JEWELLERY->value);
    //  many-to-one Pictures to Producer
    Route::get('pictures/{id}/relationships/producer', [PicturesProducerRelationshipController::class, 'index'])
        ->name(PictureNameRoutesEnum::RELATIONSHIP_TO_PRODUCER->value);
    Route::get('pictures/{id}/producer', [PicturesProducerRelatedController::class, 'index'])
        ->name(PictureNameRoutesEnum::RELATED_TO_PRODUCER->value);

    /*************************** PRODUCERS *************************/
    // CRUD
    Route::get('producers', [ProducerController::class, 'index'])->name(ProducerNameRoutesEnum::CRUD_INDEX->value);
    Route::get('producers/{id}', [ProducerController::class, 'show'])->name(ProducerNameRoutesEnum::CRUD_SHOW->value);
    Route::post('producers', [ProducerController::class, 'store'])->name(ProducerNameRoutesEnum::CRUD_POST->value);
    Route::patch('producers/{id}', [ProducerController::class, 'update'])->name(ProducerNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('producers/{id}', [ProducerController::class, 'destroy'])->name(ProducerNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Producer to Pictures
    Route::get('producers/{id}/relationships/pictures', [ProducerPicturesRelationshipController::class, 'index'])
        ->name(ProducerNameRoutesEnum::RELATIONSHIP_TO_PICTURES->value);
    Route::get('producers/{id}/pictures', [ProducerPicturesRelatedController::class, 'index'])
        ->name(ProducerNameRoutesEnum::RELATED_TO_PICTURES->value);
    //  one-to-many Producer to Videos
    Route::get('producers/{id}/relationships/videos', [ProducerVideosRelationshipController::class, 'index'])
        ->name(ProducerNameRoutesEnum::RELATIONSHIP_TO_VIDEOS->value);
    Route::get('producers/{id}/videos', [ProducerVideosRelatedController::class, 'index'])
        ->name(ProducerNameRoutesEnum::RELATED_TO_VIDEOS->value);

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
    //  one-to-many Video Type to Video Details
    Route::get('video-types/{id}/relationships/video-details', [VideoTypeVideoDetailsRelationshipController::class, 'index'])
        ->name(VideoTypeNameRoutesEnum::RELATIONSHIP_TO_VIDEO_DETAILS->value);
    Route::get('video-types/{id}/video-details', [VideoTypeVideoDetailsRelatedController::class, 'index'])
        ->name(VideoTypeNameRoutesEnum::RELATED_TO_VIDEO_DETAILS->value);
});
