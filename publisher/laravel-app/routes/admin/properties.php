<?php
declare(strict_types=1);

use App\Http\Admin\Piercing\Piercings\Controllers\PiercingController;
use App\Http\Admin\Piercing\Piercings\Controllers\PiercingJewelleryRelatedController;
use App\Http\Admin\Piercing\Piercings\Controllers\PiercingJewelleryRelationshipController;
use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {
    /*************************** BEAD BASES *************************/
    // CRUD
    Route::get('piercings', [PiercingController::class, 'index'])->name(PiercingNameRoutesEnum::CRUD_INDEX->value);
    Route::get('piercings/{id}', [PiercingController::class, 'show'])->name(PiercingNameRoutesEnum::CRUD_SHOW->value);
    Route::post('piercings', [PiercingController::class, 'store'])->name(PiercingNameRoutesEnum::CRUD_POST->value);
    Route::patch('piercings/{id}', [PiercingController::class, 'update'])->name(PiercingNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('piercings/{id}', [PiercingController::class, 'destroy'])->name(PiercingNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Bead to Jewellery
    Route::get('piercings/{id}/relationships/jewellery', [PiercingJewelleryRelationshipController::class, 'index'])
        ->name(PiercingNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('piercings/{id}/jewellery', [PiercingJewelleryRelatedController::class, 'index'])
        ->name(PiercingNameRoutesEnum::RELATED_TO_JEWELLERY->value);
});


