<?php
declare(strict_types=1);

use App\Http\Admin\BeadProperty\BeadBases\Controllers\BeadBaseBeadsRelatedController;
use App\Http\Admin\BeadProperty\BeadBases\Controllers\BeadBaseBeadsRelationshipController;
use App\Http\Admin\BeadProperty\BeadBases\Controllers\BeadBaseController;
use App\Http\Admin\BeadProperty\BeadMetrics\Controllers\BeadMetricController;
use App\Http\Admin\BeadProperty\BeadMetrics\Controllers\BeadMetricsBeadRelatedController;
use App\Http\Admin\BeadProperty\BeadMetrics\Controllers\BeadMetricsBeadRelationshipController;
use App\Http\Admin\BeadProperty\BeadMetrics\Controllers\BeadMetricsBeadSizeRelatedController;
use App\Http\Admin\BeadProperty\BeadMetrics\Controllers\BeadMetricsBeadSizeRelationshipController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadBeadMetricsRelatedController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadBeadMetricsRelationshipController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadJewelleryRelatedController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadJewelleryRelationshipController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadsBeadBaseRelatedController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadsBeadBaseRelationshipController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadsNeckSizesRelatedController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadsNeckSizesRelationshipController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadsClaspRelatedController;
use App\Http\Admin\BeadProperty\Beads\Controllers\BeadsClaspRelationshipController;
use App\Http\Admin\NecklaceProperty\Necklaces\Controllers\NecklaceController;
use App\Http\Admin\NecklaceProperty\Necklaces\Controllers\NecklaceJewelleryRelatedController;
use App\Http\Admin\NecklaceProperty\Necklaces\Controllers\NecklaceJewelleryRelationshipController;
use App\Http\Admin\NecklaceProperty\Necklaces\Controllers\NecklaceNecklaceMetricsRelatedController;
use App\Http\Admin\NecklaceProperty\Necklaces\Controllers\NecklaceNecklaceMetricsRelationshipController;
use App\Http\Admin\NecklaceProperty\Necklaces\Controllers\NecklacesClaspRelatedController;
use App\Http\Admin\NecklaceProperty\Necklaces\Controllers\NecklacesClaspRelationshipController;
use App\Http\Admin\NecklaceProperty\Necklaces\Controllers\NecklacesNeckSizesRelatedController;
use App\Http\Admin\NecklaceProperty\Necklaces\Controllers\NecklacesNeckSizesRelationshipController;
use Domain\JewelleryProperties\Beads\BeadBases\Enums\BeadBaseNameRoutesEnum;
use Domain\JewelleryProperties\Beads\BeadMetrics\Enums\BeadMetricNameRoutesEnum;
use Domain\JewelleryProperties\Beads\Beads\Enums\BeadNameRoutesEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Enums\NecklaceNameRoutesEnum;

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
    Route::get('bead-metrics/{id}/relationships/neck-size', [BeadMetricsBeadSizeRelationshipController::class, 'index'])
        ->name(BeadMetricNameRoutesEnum::RELATIONSHIP_TO_NECK_SIZE->value);
    Route::get('bead-metrics/{id}/neck-size', [BeadMetricsBeadSizeRelatedController::class, 'index'])
        ->name(BeadMetricNameRoutesEnum::RELATED_TO_NECK_SIZE->value);

    /*************************** BEADS *************************/
    // CRUD
    Route::get('beads', [BeadController::class, 'index'])->name(BeadNameRoutesEnum::CRUD_INDEX->value);
    Route::get('beads/{id}', [BeadController::class, 'show'])->name(BeadNameRoutesEnum::CRUD_SHOW->value);
    Route::post('beads', [BeadController::class, 'store'])->name(BeadNameRoutesEnum::CRUD_POST->value);
    Route::patch('beads/{id}', [BeadController::class, 'update'])->name(BeadNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('beads/{id}', [BeadController::class, 'destroy'])->name(BeadNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Bead to Jewellery
    Route::get('beads/{id}/relationships/jewellery', [BeadJewelleryRelationshipController::class, 'index'])
        ->name(BeadNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('beads/{id}/jewellery', [BeadJewelleryRelatedController::class, 'index'])
        ->name(BeadNameRoutesEnum::RELATED_TO_JEWELLERY->value);
    //  many-to-many Beads to Neck Sizes
    Route::get('beads/{id}/relationships/neck-sizes', [BeadsNeckSizesRelationshipController::class, 'index'])
        ->name(BeadNameRoutesEnum::RELATIONSHIP_TO_NECK_SIZES->value);
    Route::get('beads/{id}/neck-sizes', [BeadsNeckSizesRelatedController::class, 'index'])
        ->name(BeadNameRoutesEnum::RELATED_TO_NECK_SIZES->value);
    //  one-to-many Bead Sizes to Beads
    Route::get('beads/{id}/relationships/bead-metrics', [BeadBeadMetricsRelationshipController::class, 'index'])
        ->name(BeadNameRoutesEnum::RELATIONSHIP_TO_BEAD_METRICS->value);
    Route::get('beads/{id}/bead-metrics', [BeadBeadMetricsRelatedController::class, 'index'])
        ->name(BeadNameRoutesEnum::RELATED_TO_BEAD_METRICS->value);
    //  many-to-one Beads to Clasp
    Route::get('beads/{id}/relationships/clasp', [BeadsClaspRelationshipController::class, 'index'])
        ->name(BeadNameRoutesEnum::RELATIONSHIP_TO_CLASP->value);
    Route::get('beads/{id}/clasp', [BeadsClaspRelatedController::class, 'index'])
        ->name(BeadNameRoutesEnum::RELATED_TO_CLASP->value);
    //  many-to-one Beads to Bead Base
    Route::get('beads/{id}/relationships/bead-base', [BeadsBeadBaseRelationshipController::class, 'index'])
        ->name(BeadNameRoutesEnum::RELATIONSHIP_TO_BEAD_BASE->value);
    Route::get('beads/{id}/bead-base', [BeadsBeadBaseRelatedController::class, 'index'])
        ->name(BeadNameRoutesEnum::RELATED_TO_BEAD_BASE->value);

    /*************************** NECKLACES *************************/
    // CRUD
    Route::get('necklaces', [NecklaceController::class, 'index'])->name(NecklaceNameRoutesEnum::CRUD_INDEX->value);
    Route::get('necklaces/{id}', [NecklaceController::class, 'show'])->name(NecklaceNameRoutesEnum::CRUD_SHOW->value);
    Route::post('necklaces', [NecklaceController::class, 'store'])->name(NecklaceNameRoutesEnum::CRUD_POST->value);
    Route::patch('necklaces/{id}', [NecklaceController::class, 'update'])->name(NecklaceNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('necklaces/{id}', [NecklaceController::class, 'destroy'])->name(NecklaceNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Necklace to Jewellery
    Route::get('necklaces/{id}/relationships/jewellery', [NecklaceJewelleryRelationshipController::class, 'index'])
        ->name(NecklaceNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('necklaces/{id}/jewellery', [NecklaceJewelleryRelatedController::class, 'index'])
        ->name(NecklaceNameRoutesEnum::RELATED_TO_JEWELLERY->value);
    //  many-to-many Necklace to Neck Sizes
    Route::get('necklaces/{id}/relationships/neck-sizes', [NecklacesNeckSizesRelationshipController::class, 'index'])
        ->name(NecklaceNameRoutesEnum::RELATIONSHIP_TO_NECK_SIZES->value);
    Route::get('necklaces/{id}/neck-sizes', [NecklacesNeckSizesRelatedController::class, 'index'])
        ->name(NecklaceNameRoutesEnum::RELATED_TO_NECK_SIZES->value);
    //  one-to-many Necklaces to Necklace Metrics
    Route::get('necklaces/{id}/relationships/necklace-metrics', [NecklaceNecklaceMetricsRelationshipController::class, 'index'])
        ->name(NecklaceNameRoutesEnum::RELATIONSHIP_TO_NECKLACE_METRICS->value);
    Route::get('necklaces/{id}/necklace-metrics', [NecklaceNecklaceMetricsRelatedController::class, 'index'])
        ->name(NecklaceNameRoutesEnum::RELATED_TO_NECKLACE_METRICS->value);
    //  many-to-one Necklaces to Clasp
    Route::get('necklaces/{id}/relationships/clasp', [NecklacesClaspRelationshipController::class, 'index'])
        ->name(NecklaceNameRoutesEnum::RELATIONSHIP_TO_CLASP->value);
    Route::get('necklaces/{id}/clasp', [NecklacesClaspRelatedController::class, 'index'])
        ->name(NecklaceNameRoutesEnum::RELATED_TO_CLASP->value);
});