<?php
declare(strict_types=1);

use app\Http\Admin\SpecProperties\Brooches\Brooch\Controllers\BroochController;
use app\Http\Admin\SpecProperties\Brooches\Brooch\Controllers\BroochJewelleryRelatedController;
use app\Http\Admin\SpecProperties\Brooches\Brooch\Controllers\BroochJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Controllers\CharmPendantController;
use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Controllers\CharmPendantJewelleryRelatedController;
use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Controllers\CharmPendantJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\Piercings\Piercings\Controllers\PiercingController;
use App\Http\Admin\SpecProperties\Piercings\Piercings\Controllers\PiercingJewelleryRelatedController;
use App\Http\Admin\SpecProperties\Piercings\Piercings\Controllers\PiercingJewelleryRelationshipController;
use Domain\JewelleryProperties\Brooches\Brooches\Enums\BroochNameRoutesEnum;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Enums\CharmPendantNameRoutesEnum;
use Domain\JewelleryProperties\Piercings\Piercings\Enums\PiercingNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {
    /*************************** PIERCINGS *************************/
    // CRUD
    Route::get('piercings', [PiercingController::class, 'index'])->name(PiercingNameRoutesEnum::CRUD_INDEX->value);
    Route::get('piercings/{id}', [PiercingController::class, 'show'])->name(PiercingNameRoutesEnum::CRUD_SHOW->value);
    Route::post('piercings', [PiercingController::class, 'store'])->name(PiercingNameRoutesEnum::CRUD_POST->value);
    Route::patch('piercings/{id}', [PiercingController::class, 'update'])->name(PiercingNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('piercings/{id}', [PiercingController::class, 'destroy'])->name(PiercingNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Piercing to Jewellery
    Route::get('piercings/{id}/relationships/jewellery', [PiercingJewelleryRelationshipController::class, 'index'])
        ->name(PiercingNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('piercings/{id}/jewellery', [PiercingJewelleryRelatedController::class, 'index'])
        ->name(PiercingNameRoutesEnum::RELATED_TO_JEWELLERY->value);

    /*************************** BROOCHES *************************/
    // CRUD
    Route::get('brooches', [BroochController::class, 'index'])->name(BroochNameRoutesEnum::CRUD_INDEX->value);
    Route::get('brooches/{id}', [BroochController::class, 'show'])->name(BroochNameRoutesEnum::CRUD_SHOW->value);
    Route::post('brooches', [BroochController::class, 'store'])->name(BroochNameRoutesEnum::CRUD_POST->value);
    Route::patch('brooches/{id}', [BroochController::class, 'update'])->name(BroochNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('brooches/{id}', [BroochController::class, 'destroy'])->name(BroochNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Brooch to Jewellery
    Route::get('brooches/{id}/relationships/jewellery', [BroochJewelleryRelationshipController::class, 'index'])
        ->name(BroochNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('brooches/{id}/jewellery', [BroochJewelleryRelatedController::class, 'index'])
        ->name(BroochNameRoutesEnum::RELATED_TO_JEWELLERY->value);

    /*************************** CHARM PENDANTS *************************/
    // CRUD
    Route::get('charm-pendants', [CharmPendantController::class, 'index'])->name(CharmPendantNameRoutesEnum::CRUD_INDEX->value);
    Route::get('charm-pendants/{id}', [CharmPendantController::class, 'show'])->name(CharmPendantNameRoutesEnum::CRUD_SHOW->value);
    Route::post('charm-pendants', [CharmPendantController::class, 'store'])->name(CharmPendantNameRoutesEnum::CRUD_POST->value);
    Route::patch('charm-pendants/{id}', [CharmPendantController::class, 'update'])->name(CharmPendantNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('charm-pendants/{id}', [CharmPendantController::class, 'destroy'])->name(CharmPendantNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Brooch to Jewellery
    Route::get('charm-pendants/{id}/relationships/jewellery', [CharmPendantJewelleryRelationshipController::class, 'index'])
        ->name(CharmPendantNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('charm-pendants/{id}/jewellery', [CharmPendantJewelleryRelatedController::class, 'index'])
        ->name(CharmPendantNameRoutesEnum::RELATED_TO_JEWELLERY->value);
});


