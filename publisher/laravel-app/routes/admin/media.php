<?php
declare(strict_types=1);

use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PictureController;
use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PicturesJewelleryRelatedController;
use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PicturesJewelleryRelationshipController;
use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PicturesProducerRelatedController;
use App\Http\Admin\Media\MediaPictures\Pictures\Controllers\PicturesProducerRelationshipController;
use Domain\Medias\MediaPictures\Pictures\Enums\PictureNameRoutesEnum;

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
});
