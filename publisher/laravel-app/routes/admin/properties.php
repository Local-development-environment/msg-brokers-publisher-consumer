<?php
declare(strict_types=1);

use app\Http\Admin\SpecProperties\Brooches\Brooch\Controllers\BroochController;
use app\Http\Admin\SpecProperties\Brooches\Brooch\Controllers\BroochJewelleryRelatedController;
use app\Http\Admin\SpecProperties\Brooches\Brooch\Controllers\BroochJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Controllers\CharmPendantController;
use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Controllers\CharmPendantJewelleryRelatedController;
use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Controllers\CharmPendantJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\Pendants\Pendants\Controllers\PendantController;
use App\Http\Admin\SpecProperties\Pendants\Pendants\Controllers\PendantJewelleryRelatedController;
use App\Http\Admin\SpecProperties\Pendants\Pendants\Controllers\PendantJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\Piercings\Piercings\Controllers\PiercingController;
use App\Http\Admin\SpecProperties\Piercings\Piercings\Controllers\PiercingJewelleryRelatedController;
use App\Http\Admin\SpecProperties\Piercings\Piercings\Controllers\PiercingJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\TieClips\TieClip\Controllers\TieClipController;
use App\Http\Admin\SpecProperties\TieClips\TieClip\Controllers\TieClipJewelleryRelatedController;
use App\Http\Admin\SpecProperties\TieClips\TieClip\Controllers\TieClipJewelleryRelationshipController;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Brooches\Brooches\Enums\BroochNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\CharmPendants\CharmPendants\Enums\CharmPendantNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Pendants\Pendants\Enums\PendantNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Piercings\Piercings\Enums\PiercingNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Enums\TieClipNameRoutesEnum;

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
    //  one-to-one Charm Pendant to Jewellery
    Route::get('charm-pendants/{id}/relationships/jewellery', [CharmPendantJewelleryRelationshipController::class, 'index'])
        ->name(CharmPendantNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('charm-pendants/{id}/jewellery', [CharmPendantJewelleryRelatedController::class, 'index'])
        ->name(CharmPendantNameRoutesEnum::RELATED_TO_JEWELLERY->value);

    /*************************** PENDANTS *************************/
    // CRUD
    Route::get('pendants', [PendantController::class, 'index'])->name(PendantNameRoutesEnum::CRUD_INDEX->value);
    Route::get('pendants/{id}', [PendantController::class, 'show'])->name(PendantNameRoutesEnum::CRUD_SHOW->value);
    Route::post('pendants', [PendantController::class, 'store'])->name(PendantNameRoutesEnum::CRUD_POST->value);
    Route::patch('pendants/{id}', [PendantController::class, 'update'])->name(PendantNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('pendants/{id}', [PendantController::class, 'destroy'])->name(PendantNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Pendant to Jewellery
    Route::get('pendants/{id}/relationships/jewellery', [PendantJewelleryRelationshipController::class, 'index'])
        ->name(PendantNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('pendants/{id}/jewellery', [PendantJewelleryRelatedController::class, 'index'])
        ->name(PendantNameRoutesEnum::RELATED_TO_JEWELLERY->value);

    /*************************** TIE CLIPS *************************/
    // CRUD
    Route::get('tie-clips', [TieClipController::class, 'index'])->name(TieClipNameRoutesEnum::CRUD_INDEX->value);
    Route::get('tie-clips/{id}', [TieClipController::class, 'show'])->name(TieClipNameRoutesEnum::CRUD_SHOW->value);
    Route::post('tie-clips', [TieClipController::class, 'store'])->name(TieClipNameRoutesEnum::CRUD_POST->value);
    Route::patch('tie-clips/{id}', [TieClipController::class, 'update'])->name(TieClipNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('tie-clips/{id}', [TieClipController::class, 'destroy'])->name(TieClipNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Tie Clip to Jewellery
    Route::get('tie-clips/{id}/relationships/jewellery', [TieClipJewelleryRelationshipController::class, 'index'])
        ->name(TieClipNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('tie-clips/{id}/jewellery', [TieClipJewelleryRelatedController::class, 'index'])
        ->name(TieClipNameRoutesEnum::RELATED_TO_JEWELLERY->value);
});


