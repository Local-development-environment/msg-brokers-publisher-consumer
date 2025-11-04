<?php

declare(strict_types=1);

use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryBeadRelatedController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryBeadRelationshipController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryController;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {
    /*************************** JEWELLERIES *************************/
// CRUD
    Route::get('jewelleries', [JewelleryController::class, 'index'])->name(JewelleryNameRoutesEnum::CRUD_INDEX->value);
    Route::get('jewelleries/{id}', [JewelleryController::class, 'index'])->name(JewelleryNameRoutesEnum::CRUD_SHOW->value);
    Route::post('jewelleries', [JewelleryController::class, 'index'])->name(JewelleryNameRoutesEnum::CRUD_POST->value);
    Route::patch('jewelleries', [JewelleryController::class, 'index'])->name(JewelleryNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('jewelleries', [JewelleryController::class, 'index'])->name(JewelleryNameRoutesEnum::CRUD_DELETE->value);

// RELATIONSHIPS
//  one-to-one Jewellery to Bead
    Route::get('jewelleries/{id}/relationships/bead', [JewelleryBeadRelationshipController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATIONSHIP_TO_BEAD->value);
    Route::get('jewelleries/{id}/bead', [JewelleryBeadRelatedController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATED_TO_BEAD->value);

});