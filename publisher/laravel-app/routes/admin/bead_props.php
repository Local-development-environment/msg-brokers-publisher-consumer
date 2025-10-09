<?php
declare(strict_types=1);

use App\Http\Admin\BeadProperty\BeadBases\Controllers\BeadBaseBeadsRelatedController;
use App\Http\Admin\BeadProperty\BeadBases\Controllers\BeadBaseBeadsRelationshipController;
use App\Http\Admin\BeadProperty\BeadBases\Controllers\BeadBaseController;
use App\Http\Admin\BeadProperty\BeadBases\Controllers\BeadBasesClaspsRelatedController;
use App\Http\Admin\BeadProperty\BeadBases\Controllers\BeadBasesClaspsRelationshipController;
use App\Http\Admin\BeadProperty\BeadMetrics\Controllers\BeadMetricController;
use App\Http\Admin\BeadProperty\BeadMetrics\Controllers\BeadMetricsBeadRelatedController;
use App\Http\Admin\BeadProperty\BeadMetrics\Controllers\BeadMetricsBeadRelationshipController;
use App\Http\Admin\BeadProperty\BeadMetrics\Controllers\BeadMetricsBeadSizeRelatedController;
use App\Http\Admin\BeadProperty\BeadMetrics\Controllers\BeadMetricsBeadSizeRelationshipController;
use App\Http\Admin\BeadProperty\BeadSizes\Controllers\BeadSizeBeadMetricsRelatedController;
use App\Http\Admin\BeadProperty\BeadSizes\Controllers\BeadSizeBeadMetricsRelationshipController;
use App\Http\Admin\BeadProperty\BeadSizes\Controllers\BeadSizeController;
use App\Http\Admin\BeadProperty\BeadSizes\Controllers\BeadSizesBeadsRelatedController;
use App\Http\Admin\BeadProperty\BeadSizes\Controllers\BeadSizesBeadsRelationshipController;
use App\Http\Admin\BeadProperty\BeadSizes\Controllers\BeadSizesLengthNameRelatedController;
use App\Http\Admin\BeadProperty\BeadSizes\Controllers\BeadSizesLengthNameRelationshipController;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadSizes\Enums\BeadSizeNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {
    /*************************** BEAD BASES *************************/
    // CRUD
    Route::get('bead-bases', [BeadBaseController::class, 'index'])->name(BeadBaseNameRoutesEnum::CRUD_INDEX->value);
    Route::get('bead-bases/{id}', [BeadBaseController::class, 'show'])->name(BeadBaseNameRoutesEnum::CRUD_SHOW->value);
    Route::post('bead-bases', [BeadBaseController::class, 'store'])->name(BeadBaseNameRoutesEnum::CRUD_POST->value);
    Route::patch('bead-bases/{id}', [BeadBaseController::class, 'update'])->name(BeadBaseNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('bead-bases/{id}', [BeadBaseController::class, 'destroy'])->name(BeadBaseNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Bead Base to Beads
    Route::get('bead-bases/{id}/relationships/beads', [BeadBaseBeadsRelationshipController::class, 'index'])
        ->name(BeadBaseNameRoutesEnum::RELATIONSHIP_TO_BEADS->value);
    Route::get('bead-bases/{id}/beads', [BeadBaseBeadsRelatedController::class, 'index'])
        ->name(BeadBaseNameRoutesEnum::RELATED_TO_BEADS->value);
    //  many-to-many Bead Bases to Clasps
    Route::get('bead-bases/{id}/relationships/clasps', [BeadBasesClaspsRelationshipController::class, 'index'])
        ->name(BeadBaseNameRoutesEnum::RELATIONSHIP_TO_CLASPS->value);
    Route::get('bead-bases/{id}/clasps', [BeadBasesClaspsRelatedController::class, 'index'])
        ->name(BeadBaseNameRoutesEnum::RELATED_TO_CLASPS->value);

    /*************************** BEAD SIZES *************************/
    // CRUD
    Route::get('bead-sizes', [BeadSizeController::class, 'index'])->name(BeadSizeNameRoutesEnum::CRUD_INDEX->value);
    Route::get('bead-sizes/{id}', [BeadSizeController::class, 'show'])->name(BeadSizeNameRoutesEnum::CRUD_SHOW->value);
    Route::post('bead-sizes', [BeadSizeController::class, 'store'])->name(BeadSizeNameRoutesEnum::CRUD_POST->value);
    Route::patch('bead-sizes/{id}', [BeadSizeController::class, 'update'])->name(BeadSizeNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('bead-sizes/{id}', [BeadSizeController::class, 'destroy'])->name(BeadSizeNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Bead Sizes to Length Name
    Route::get('bead-sizes/{id}/relationships/length-name', [BeadSizesLengthNameRelationshipController::class, 'index'])
        ->name(BeadSizeNameRoutesEnum::RELATIONSHIP_TO_LENGTH_NAME->value);
    Route::get('bead-sizes/{id}/length-name', [BeadSizesLengthNameRelatedController::class, 'index'])
        ->name(BeadSizeNameRoutesEnum::RELATED_TO_LENGTH_NAME->value);
    //  many-to-many Bead Sizes to Beads
    Route::get('bead-sizes/{id}/relationships/beads', [BeadSizesBeadsRelationshipController::class, 'index'])
        ->name(BeadSizeNameRoutesEnum::RELATIONSHIP_TO_BEADS->value);
    Route::get('bead-sizes/{id}/beads', [BeadSizesBeadsRelatedController::class, 'index'])
        ->name(BeadSizeNameRoutesEnum::RELATED_TO_BEADS->value);
    //  one-to-many Bead Sizes to Beads
    Route::get('bead-sizes/{id}/relationships/bead-metrics', [BeadSizeBeadMetricsRelationshipController::class, 'index'])
        ->name(BeadSizeNameRoutesEnum::RELATIONSHIP_TO_BEAD_METRICS->value);
    Route::get('bead-sizes/{id}/bead-metrics', [BeadSizeBeadMetricsRelatedController::class, 'index'])
        ->name(BeadSizeNameRoutesEnum::RELATED_TO_BEAD_METRICS->value);

    /*************************** BEAD METRICS *************************/
    // CRUD
    Route::get('bead-metrics', [BeadMetricController::class, 'index'])->name(BeadMetricNameRoutesEnum::CRUD_INDEX->value);
    Route::get('bead-metrics/{id}', [BeadMetricController::class, 'show'])->name(BeadMetricNameRoutesEnum::CRUD_SHOW->value);
    Route::post('bead-metrics', [BeadMetricController::class, 'store'])->name(BeadMetricNameRoutesEnum::CRUD_POST->value);
    Route::patch('bead-metrics/{id}', [BeadMetricController::class, 'update'])->name(BeadMetricNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('bead-metrics/{id}', [BeadMetricController::class, 'destroy'])->name(BeadMetricNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Bead Metrics to Bead
    Route::get('bead-metrics/{id}/relationships/bead', [BeadMetricsBeadRelationshipController::class, 'index'])
        ->name(BeadMetricNameRoutesEnum::RELATIONSHIP_TO_BEAD->value);
    Route::get('bead-metrics/{id}/bead', [BeadMetricsBeadRelatedController::class, 'index'])
        ->name(BeadMetricNameRoutesEnum::RELATED_TO_BEAD->value);
    //  many-to-one Bead Metrics to Bead Size
    Route::get('bead-metrics/{id}/relationships/bead-size', [BeadMetricsBeadSizeRelationshipController::class, 'index'])
        ->name(BeadMetricNameRoutesEnum::RELATIONSHIP_TO_BEAD_SIZE->value);
    Route::get('bead-metrics/{id}/bead-size', [BeadMetricsBeadSizeRelatedController::class, 'index'])
        ->name(BeadMetricNameRoutesEnum::RELATED_TO_BEAD_SIZE->value);
});