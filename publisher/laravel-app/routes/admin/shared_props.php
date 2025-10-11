<?php

declare(strict_types=1);

use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspBeadsRelatedController;
use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspBeadsRelationshipController;
use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspController;
use App\Http\Admin\SharedProperty\LengthNames\Controllers\LengthNameBeadSizesRelatedController;
use App\Http\Admin\SharedProperty\LengthNames\Controllers\LengthNameBeadSizesRelationshipController;
use App\Http\Admin\SharedProperty\LengthNames\Controllers\LengthNameController;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspNameRoutesEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {
    /*************************** CLASPS *************************/
    // CRUD
    Route::get('clasps', [ClaspController::class, 'index'])->name(ClaspNameRoutesEnum::CRUD_INDEX->value);
    Route::get('clasps/{id}', [ClaspController::class, 'show'])->name(ClaspNameRoutesEnum::CRUD_SHOW->value);
    Route::post('clasps', [ClaspController::class, 'store'])->name(ClaspNameRoutesEnum::CRUD_POST->value);
    Route::patch('clasps/{id}', [ClaspController::class, 'update'])->name(ClaspNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('clasps/{id}', [ClaspController::class, 'destroy'])->name(ClaspNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Clasp to Beads
    Route::get('clasps/{id}/relationships/beads', [ClaspBeadsRelationshipController::class, 'index'])
        ->name(ClaspNameRoutesEnum::RELATIONSHIP_TO_BEADS->value);
    Route::get('clasps/{id}/beads', [ClaspBeadsRelatedController::class, 'index'])
        ->name(ClaspNameRoutesEnum::RELATED_TO_BEADS->value);

    /*************************** LENGTH NAMES *************************/
    // CRUD
    Route::get('length-names', [LengthNameController::class, 'index'])->name(LengthNameNameRoutesEnum::CRUD_INDEX->value);
    Route::get('length-names/{id}', [LengthNameController::class, 'show'])->name(LengthNameNameRoutesEnum::CRUD_SHOW->value);
    Route::post('length-names', [LengthNameController::class, 'store'])->name(LengthNameNameRoutesEnum::CRUD_POST->value);
    Route::patch('length-names/{id}', [LengthNameController::class, 'update'])->name(LengthNameNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('length-names/{id}', [LengthNameController::class, 'destroy'])->name(LengthNameNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Length Name to Bead Sizes
    Route::get('length-names/{id}/relationships/bead-sizes', [LengthNameBeadSizesRelationshipController::class, 'index'])
        ->name(LengthNameNameRoutesEnum::RELATIONSHIP_TO_BEAD_SIZES->value);
    Route::get('length-names/{id}/bead-sizes', [LengthNameBeadSizesRelatedController::class, 'index'])
        ->name(LengthNameNameRoutesEnum::RELATED_TO_BEAD_SIZES->value);
});