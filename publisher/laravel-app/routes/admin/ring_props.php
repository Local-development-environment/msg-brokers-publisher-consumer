<?php
declare(strict_types=1);

use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingController;
use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingJewelleryRelatedController;
use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingRingDetailsRelatedController;
use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingRingDetailsRelationshipController;
use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingRingMetricsRelatedController;
use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingRingMetricsRelationshipController;
use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingsRingSizesRelatedController;
use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingsRingSizesRelationshipController;
use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingsRingTypesRelatedController;
use App\Http\Admin\SpecProperties\Rings\Ring\Controllers\RingsRingTypesRelationshipController;
use Domain\JewelleryProperties\Rings\RingDetails\Enums\RingDetailNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingMetrics\Enums\RingMetricNameRoutesEnum;
use Domain\JewelleryProperties\Rings\Rings\Enums\RingNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingTypes\Enums\RingTypeNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {
    /*************************** RING TYPES *************************/
    // CRUD
    Route::get('ring-types', [RingTypeController::class, 'index'])->name(RingTypeNameRoutesEnum::CRUD_INDEX->value);
    Route::get('ring-types/{id}', [RingTypeController::class, 'show'])->name(RingTypeNameRoutesEnum::CRUD_SHOW->value);
    Route::post('ring-types', [RingTypeController::class, 'store'])->name(RingTypeNameRoutesEnum::CRUD_POST->value);
    Route::patch('ring-types/{id}', [RingTypeController::class, 'update'])->name(RingTypeNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('ring-types/{id}', [RingTypeController::class, 'destroy'])->name(RingTypeNameRoutesEnum::CRUD_DELETE->value);

    /*************************** RING FINGERS *************************/
    // CRUD
    Route::get('ring-fingers', [RingFingerController::class, 'index'])->name(RingFingerNameRoutesEnum::CRUD_INDEX->value);
    Route::get('ring-fingers/{id}', [RingFingerController::class, 'show'])->name(RingFingerNameRoutesEnum::CRUD_SHOW->value);
    Route::post('ring-fingers', [RingFingerController::class, 'store'])->name(RingFingerNameRoutesEnum::CRUD_POST->value);
    Route::patch('ring-fingers/{id}', [RingFingerController::class, 'update'])->name(RingFingerNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('ring-fingers/{id}', [RingFingerController::class, 'destroy'])->name(RingFingerNameRoutesEnum::CRUD_DELETE->value);

    /*************************** RING SIZES *************************/
    // CRUD
    Route::get('ring-sizes', [RingSizeController::class, 'index'])->name(RingSizeNameRoutesEnum::CRUD_INDEX->value);
    Route::get('ring-sizes/{id}', [RingSizeController::class, 'show'])->name(RingSizeNameRoutesEnum::CRUD_SHOW->value);
    Route::post('ring-sizes', [RingSizeController::class, 'store'])->name(RingSizeNameRoutesEnum::CRUD_POST->value);
    Route::patch('ring-sizes/{id}', [RingSizeController::class, 'update'])->name(RingSizeNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('ring-sizes/{id}', [RingSizeController::class, 'destroy'])->name(RingSizeNameRoutesEnum::CRUD_DELETE->value);

    /*************************** RING DETAILS *************************/
    // CRUD
    Route::get('ring-details', [RingDetailController::class, 'index'])->name(RingDetailNameRoutesEnum::CRUD_INDEX->value);
    Route::get('ring-details/{id}', [RingDetailController::class, 'show'])->name(RingDetailNameRoutesEnum::CRUD_SHOW->value);
    Route::post('ring-details', [RingDetailController::class, 'store'])->name(RingDetailNameRoutesEnum::CRUD_POST->value);
    Route::patch('ring-details/{id}', [RingDetailController::class, 'update'])->name(RingDetailNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('ring-details/{id}', [RingDetailController::class, 'destroy'])->name(RingDetailNameRoutesEnum::CRUD_DELETE->value);

    /*************************** RING METRICS *************************/
    // CRUD
    Route::get('ring-metrics', [RingMetricController::class, 'index'])->name(RingMetricNameRoutesEnum::CRUD_INDEX->value);
    Route::get('ring-metrics/{id}', [RingMetricController::class, 'show'])->name(RingMetricNameRoutesEnum::CRUD_SHOW->value);
    Route::post('ring-metrics', [RingMetricController::class, 'store'])->name(RingMetricNameRoutesEnum::CRUD_POST->value);
    Route::patch('ring-metrics/{id}', [RingMetricController::class, 'update'])->name(RingMetricNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('ring-metrics/{id}', [RingMetricController::class, 'destroy'])->name(RingMetricNameRoutesEnum::CRUD_DELETE->value);

    /*************************** RINGS *************************/
    // CRUD
    Route::get('rings', [RingController::class, 'index'])->name(RingNameRoutesEnum::CRUD_INDEX->value);
    Route::get('rings/{id}', [RingController::class, 'show'])->name(RingNameRoutesEnum::CRUD_SHOW->value);
    Route::post('rings', [RingController::class, 'store'])->name(RingNameRoutesEnum::CRUD_POST->value);
    Route::patch('rings/{id}', [RingController::class, 'update'])->name(RingNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('rings/{id}', [RingController::class, 'destroy'])->name(RingNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Ring Jewellery
    Route::get('rings/{id}/relationships/jewellery', [RingJewelleryRelationshipController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('rings/{id}/jewellery', [RingJewelleryRelatedController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATED_TO_JEWELLERY->value);

    //  one-to-many Ring Ring Details
    Route::get('rings/{id}/relationships/ring-details', [RingRingDetailsRelationshipController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATIONSHIP_TO_RING_DETAILS->value);
    Route::get('rings/{id}/ring-details', [RingRingDetailsRelatedController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATED_TO_RING_DETAILS->value);

    //  one-to-many Ring Ring Metrics
    Route::get('rings/{id}/relationships/ring-metrics', [RingRingMetricsRelationshipController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATIONSHIP_TO_RING_METRICS->value);
    Route::get('rings/{id}/ring-metrics', [RingRingMetricsRelatedController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATED_TO_RING_METRICS->value);

    //  one-to-many Rings Ring Sizes
    Route::get('rings/{id}/relationships/ring-sizes', [RingsRingSizesRelationshipController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATIONSHIP_TO_RING_SIZES->value);
    Route::get('rings/{id}/ring-sizes', [RingsRingSizesRelatedController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATED_TO_RING_SIZES->value);

    //  one-to-many Rings Ring Types
    Route::get('rings/{id}/relationships/ring-types', [RingsRingTypesRelationshipController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATIONSHIP_TO_RING_TYPES->value);
    Route::get('rings/{id}/ring-types', [RingsRingTypesRelatedController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATED_TO_RING_TYPES->value);

    //  one-to-many Rings Ring Finger
    Route::get('rings/{id}/relationships/ring-finger', [RingsRingTypesRelationshipController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATIONSHIP_TO_RING_FINGER->value);
    Route::get('rings/{id}/ring-finger', [RingsRingTypesRelatedController::class, 'index'])
        ->name(RingNameRoutesEnum::RELATED_TO_RING_FINGER->value);
});
