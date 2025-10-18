<?php

declare(strict_types=1);

use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspBeadsRelatedController;
use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspBeadsRelationshipController;
use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspController;
use App\Http\Admin\SharedProperty\LengthNames\Controllers\LengthNameBeadSizesRelatedController;
use App\Http\Admin\SharedProperty\LengthNames\Controllers\LengthNameBeadSizesRelationshipController;
use App\Http\Admin\SharedProperty\LengthNames\Controllers\LengthNameController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizeBeadMetricsRelatedController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizeBeadMetricsRelationshipController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizeChainMetricsRelatedController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizeChainMetricsRelationshipController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizeController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizeNecklaceMetricsRelatedController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizeNecklaceMetricsRelationshipController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizesBeadsRelatedController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizesBeadsRelationshipController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizesChainsRelatedController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizesChainsRelationshipController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizesLengthNameRelatedController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizesLengthNameRelationshipController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizesNecklacesRelatedController;
use App\Http\Admin\SharedProperty\NeckSizes\Controllers\NeckSizesNecklacesRelationshipController;
use Domain\Shared\JewelleryProperties\Clasps\Enums\ClaspNameRoutesEnum;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameNameRoutesEnum;
use Domain\Shared\JewelleryProperties\NeckSizes\Enums\NeckSizeNameRoutesEnum;

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

    /*************************** BEAD SIZES *************************/
    // CRUD
    Route::get('neck-sizes', [NeckSizeController::class, 'index'])->name(NeckSizeNameRoutesEnum::CRUD_INDEX->value);
    Route::get('neck-sizes/{id}', [NeckSizeController::class, 'show'])->name(NeckSizeNameRoutesEnum::CRUD_SHOW->value);
    Route::post('neck-sizes', [NeckSizeController::class, 'store'])->name(NeckSizeNameRoutesEnum::CRUD_POST->value);
    Route::patch('neck-sizes/{id}', [NeckSizeController::class, 'update'])->name(NeckSizeNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('neck-sizes/{id}', [NeckSizeController::class, 'destroy'])->name(NeckSizeNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Neck Sizes to Length Name
    Route::get('neck-sizes/{id}/relationships/length-name', [NeckSizesLengthNameRelationshipController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATIONSHIP_TO_LENGTH_NAME->value);
    Route::get('neck-sizes/{id}/length-name', [NeckSizesLengthNameRelatedController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATED_TO_LENGTH_NAME->value);
    //  many-to-many Neck Sizes to Beads
    Route::get('neck-sizes/{id}/relationships/beads', [NeckSizesBeadsRelationshipController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATIONSHIP_TO_BEADS->value);
    Route::get('neck-sizes/{id}/beads', [NeckSizesBeadsRelatedController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATED_TO_BEADS->value);
    //  many-to-many Neck Sizes to Chains
    Route::get('neck-sizes/{id}/relationships/chains', [NeckSizesChainsRelationshipController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATIONSHIP_TO_CHAINS->value);
    Route::get('neck-sizes/{id}/chains', [NeckSizesChainsRelatedController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATED_TO_CHAINS->value);
    //  many-to-many Neck Sizes to Necklaces
    Route::get('neck-sizes/{id}/relationships/necklaces', [NeckSizesNecklacesRelationshipController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATIONSHIP_TO_NECKLACES->value);
    Route::get('neck-sizes/{id}/necklaces', [NeckSizesNecklacesRelatedController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATED_TO_NECKLACES->value);
    //  one-to-many Neck Sizes to Bead Metrics
    Route::get('neck-sizes/{id}/relationships/bead-metrics', [NeckSizeBeadMetricsRelationshipController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATIONSHIP_TO_BEAD_METRICS->value);
    Route::get('neck-sizes/{id}/bead-metrics', [NeckSizeBeadMetricsRelatedController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATED_TO_BEAD_METRICS->value);
    //  one-to-many Neck Sizes to Chain Metrics
    Route::get('neck-sizes/{id}/relationships/chain-metrics', [NeckSizeChainMetricsRelationshipController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATIONSHIP_TO_BEAD_METRICS->value);
    Route::get('neck-sizes/{id}/chain-metrics', [NeckSizeChainMetricsRelatedController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATED_TO_BEAD_METRICS->value);
    //  one-to-many Neck Sizes to Necklace Metrics
    Route::get('neck-sizes/{id}/relationships/necklace-metrics', [NeckSizeNecklaceMetricsRelationshipController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATIONSHIP_TO_BEAD_METRICS->value);
    Route::get('neck-sizes/{id}/necklace-metrics', [NeckSizeNecklaceMetricsRelatedController::class, 'index'])
        ->name(NeckSizeNameRoutesEnum::RELATED_TO_BEAD_METRICS->value);
});