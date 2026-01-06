<?php

declare(strict_types=1);

use App\Http\Admin\SpecProperties\Bracelets\BodyPart\Controllers\BodyPartBraceletsRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\BodyPart\Controllers\BodyPartBraceletsRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\BodyPart\Controllers\BodyPartController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletBraceletMetricsRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletBraceletMetricsRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletBraceletWeavingsRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletBraceletWeavingsRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletJewelleryRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletsBodyPartRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletsBodyPartRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletsBraceletBaseRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletsBraceletBaseRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletsBraceletSizesRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletsBraceletSizesRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletsClaspRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletsClaspRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletsWeavingsRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers\BraceletsWeavingsRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletBase\Controllers\BraceletBaseBraceletsRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletBase\Controllers\BraceletBaseBraceletsRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletBase\Controllers\BraceletBaseController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Controllers\BraceletMetricController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Controllers\BraceletMetricsBraceletRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Controllers\BraceletMetricsBraceletRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Controllers\BraceletMetricsBraceletSizeRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Controllers\BraceletMetricsBraceletSizeRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Controllers\BraceletSizeBraceletMetricsRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Controllers\BraceletSizeBraceletMetricsRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Controllers\BraceletSizeController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Controllers\BraceletSizesBraceletsRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Controllers\BraceletSizesBraceletsRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletWeaving\Controllers\BraceletWeavingController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletWeaving\Controllers\BraceletWeavingsBraceletRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletWeaving\Controllers\BraceletWeavingsBraceletRelationshipController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletWeaving\Controllers\BraceletWeavingsBraceletSizeRelatedController;
use App\Http\Admin\SpecProperties\Bracelets\BraceletWeaving\Controllers\BraceletWeavingsBraceletSizeRelationshipController;
use Domain\JewelleryProperties\Bracelets\BodyParts\Enums\BodyPartNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\BraceletBases\Enums\BraceletBaseNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums\BraceletMetricNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Enums\BraceletNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Enums\BraceletSizeNameRoutesEnum;
use Domain\JewelleryProperties\Bracelets\BraceletWeavings\Enums\BraceletWeavingNameRoutesEnum;


Route::group([
    'middleware' => 'auth:admin'
], function () {
    /*************************** BRACELETS *************************/
    // CRUD
    Route::get('bracelets', [BraceletController::class, 'index'])->name(BraceletNameRoutesEnum::CRUD_INDEX->value);
    Route::get('bracelets/{id}', [BraceletController::class, 'show'])->name(BraceletNameRoutesEnum::CRUD_SHOW->value);
    Route::post('bracelets', [BraceletController::class, 'store'])->name(BraceletNameRoutesEnum::CRUD_POST->value);
    Route::patch('bracelets/{id}', [BraceletController::class, 'update'])->name(BraceletNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('bracelets/{id}', [BraceletController::class, 'destroy'])->name(BraceletNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Bracelet to Jewellery
    Route::get('bracelets/{id}/relationships/jewellery', [BraceletJewelleryRelationshipController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('bracelets/{id}/jewellery', [BraceletJewelleryRelatedController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATED_TO_JEWELLERY->value);
    //  one-to-many Bracelet to Bracelet Metrics
    Route::get('bracelets/{id}/relationships/bracelet-metrics', [BraceletBraceletMetricsRelationshipController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATIONSHIP_TO_BRACELET_METRICS->value);
    Route::get('bracelets/{id}/bracelet-metrics', [BraceletBraceletMetricsRelatedController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATED_TO_BRACELET_METRICS->value);
    //  many-to-many Bracelets to Bracelet Sizes
    Route::get('bracelets/{id}/relationships/bracelet-sizes', [BraceletsBraceletSizesRelationshipController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATIONSHIP_TO_BRACELET_SIZES->value);
    Route::get('bracelets/{id}/bracelet-sizes', [BraceletsBraceletSizesRelatedController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATED_TO_BRACELET_SIZES->value);
    //  many-to-one Bracelets to Clasp
    Route::get('bracelets/{id}/relationships/clasp', [BraceletsClaspRelationshipController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATIONSHIP_TO_CLASP->value);
    Route::get('bracelets/{id}/clasp', [BraceletsClaspRelatedController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATED_TO_CLASP->value);
    //  many-to-one Bracelets to Body Part
    Route::get('bracelets/{id}/relationships/body-part', [BraceletsBodyPartRelationshipController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATIONSHIP_TO_BODY_PART->value);
    Route::get('bracelets/{id}/body-part', [BraceletsBodyPartRelatedController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATED_TO_BODY_PART->value);
    //  many-to-one Bracelets to Bracelet Base
    Route::get('bracelets/{id}/relationships/bracelet-base', [BraceletsBraceletBaseRelationshipController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATIONSHIP_TO_BRACELET_BASE->value);
    Route::get('bracelets/{id}/bracelet-base', [BraceletsBraceletBaseRelatedController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATED_TO_BRACELET_BASE->value);
    //  one-to-many Bracelet to Bracelet Weavings
    Route::get('bracelets/{id}/relationships/bracelet-weavings', [BraceletBraceletWeavingsRelationshipController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATIONSHIP_TO_BRACELET_WEAVINGS->value);
    Route::get('bracelets/{id}/bracelet-weavings', [BraceletBraceletWeavingsRelatedController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATED_TO_BRACELET_WEAVINGS->value);
    //  many-to-many Bracelets to Weavings
    Route::get('bracelets/{id}/relationships/weavings', [BraceletsWeavingsRelationshipController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATIONSHIP_TO_WEAVINGS->value);
    Route::get('bracelets/{id}/weavings', [BraceletsWeavingsRelatedController::class, 'index'])
        ->name(BraceletNameRoutesEnum::RELATED_TO_WEAVINGS->value);

    /*************************** BRACELET SIZES *************************/
    // CRUD
    Route::get('bracelet-sizes', [BraceletSizeController::class, 'index'])->name(BraceletSizeNameRoutesEnum::CRUD_INDEX->value);
    Route::get('bracelet-sizes/{id}', [BraceletSizeController::class, 'show'])->name(BraceletSizeNameRoutesEnum::CRUD_SHOW->value);
    Route::post('bracelet-sizes', [BraceletSizeController::class, 'store'])->name(BraceletSizeNameRoutesEnum::CRUD_POST->value);
    Route::patch('bracelet-sizes/{id}', [BraceletSizeController::class, 'update'])->name(BraceletSizeNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('bracelet-sizes/{id}', [BraceletSizeController::class, 'destroy'])->name(BraceletSizeNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Bracelet Sizes to Bracelet Metrics
    Route::get('bracelet-sizes/{id}/relationships/bracelet-metrics', [BraceletSizeBraceletMetricsRelationshipController::class, 'index'])
        ->name(BraceletSizeNameRoutesEnum::RELATIONSHIP_TO_BRACELET_METRICS->value);
    Route::get('bracelet-sizes/{id}/bracelet-metrics', [BraceletSizeBraceletMetricsRelatedController::class, 'index'])
        ->name(BraceletSizeNameRoutesEnum::RELATED_TO_BRACELET_METRICS->value);
    //  many-to-many Bracelet Sizes to Bracelets
    Route::get('bracelet-sizes/{id}/relationships/bracelets', [BraceletSizesBraceletsRelationshipController::class, 'index'])
        ->name(BraceletSizeNameRoutesEnum::RELATIONSHIP_TO_BRACELETS->value);
    Route::get('bracelet-sizes/{id}/bracelets', [BraceletSizesBraceletsRelatedController::class, 'index'])
        ->name(BraceletSizeNameRoutesEnum::RELATED_TO_BRACELETS->value);

    /*************************** BRACELET METRICS *************************/
    // CRUD
    Route::get('bracelet-metrics', [BraceletMetricController::class, 'index'])->name(BraceletMetricNameRoutesEnum::CRUD_INDEX->value);
    Route::get('bracelet-metrics/{id}', [BraceletMetricController::class, 'show'])->name(BraceletMetricNameRoutesEnum::CRUD_SHOW->value);
    Route::post('bracelet-metrics', [BraceletMetricController::class, 'store'])->name(BraceletMetricNameRoutesEnum::CRUD_POST->value);
    Route::patch('bracelet-metrics/{id}', [BraceletMetricController::class, 'update'])->name(BraceletMetricNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('bracelet-metrics/{id}', [BraceletMetricController::class, 'destroy'])->name(BraceletMetricNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Bracelet Metrics to Bracelet size
    Route::get('bracelet-metrics/{id}/relationships/bracelet-size', [BraceletMetricsBraceletSizeRelationshipController::class, 'index'])
        ->name(BraceletMetricNameRoutesEnum::RELATIONSHIP_TO_BRACELET_SIZE->value);
    Route::get('bracelet-metrics/{id}/bracelet-size', [BraceletMetricsBraceletSizeRelatedController::class, 'index'])
        ->name(BraceletMetricNameRoutesEnum::RELATED_TO_BRACELET_SIZE->value);
    //  many-to-one Bracelet Metrics to Bracelet
    Route::get('bracelet-metrics/{id}/relationships/bracelet', [BraceletMetricsBraceletRelationshipController::class, 'index'])
        ->name(BraceletMetricNameRoutesEnum::RELATIONSHIP_TO_BRACELET->value);
    Route::get('bracelet-metrics/{id}/bracelet', [BraceletMetricsBraceletRelatedController::class, 'index'])
        ->name(BraceletMetricNameRoutesEnum::RELATED_TO_BRACELET->value);

    /*************************** BODY PARTS *************************/
    // CRUD
    Route::get('body-parts', [BodyPartController::class, 'index'])->name(BodyPartNameRoutesEnum::CRUD_INDEX->value);
    Route::get('body-parts/{id}', [BodyPartController::class, 'show'])->name(BodyPartNameRoutesEnum::CRUD_SHOW->value);
    Route::post('body-parts', [BodyPartController::class, 'store'])->name(BodyPartNameRoutesEnum::CRUD_POST->value);
    Route::patch('body-parts/{id}', [BodyPartController::class, 'update'])->name(BodyPartNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('body-parts/{id}', [BodyPartController::class, 'destroy'])->name(BodyPartNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Body Part to Bracelets
    Route::get('body-parts/{id}/relationships/bracelets', [BodyPartBraceletsRelationshipController::class, 'index'])
        ->name(BodyPartNameRoutesEnum::RELATIONSHIP_TO_BRACELETS->value);
    Route::get('body-parts/{id}/bracelets', [BodyPartBraceletsRelatedController::class, 'index'])
        ->name(BodyPartNameRoutesEnum::RELATED_TO_BRACELETS->value);

    /*************************** BRACELET BASES *************************/
    // CRUD
    Route::get('bracelet-bases', [BraceletBaseController::class, 'index'])->name(BraceletBaseNameRoutesEnum::CRUD_INDEX->value);
    Route::get('bracelet-bases/{id}', [BraceletBaseController::class, 'show'])->name(BraceletBaseNameRoutesEnum::CRUD_SHOW->value);
    Route::post('bracelet-bases', [BraceletBaseController::class, 'store'])->name(BraceletBaseNameRoutesEnum::CRUD_POST->value);
    Route::patch('bracelet-bases/{id}', [BraceletBaseController::class, 'update'])->name(BraceletBaseNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('bracelet-bases/{id}', [BraceletBaseController::class, 'destroy'])->name(BraceletBaseNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Bracelet Bases to Bracelets
    Route::get('bracelet-bases/{id}/relationships/bracelets', [BraceletBaseBraceletsRelationshipController::class, 'index'])
        ->name(BraceletBaseNameRoutesEnum::RELATIONSHIP_TO_BRACELETS->value);
    Route::get('bracelet-bases/{id}/bracelets', [BraceletBaseBraceletsRelatedController::class, 'index'])
        ->name(BraceletBaseNameRoutesEnum::RELATED_TO_BRACELETS->value);

    /*************************** BRACELET WEAVINGS *************************/
    // CRUD
    Route::get('bracelet-weavings', [BraceletWeavingController::class, 'index'])->name(BraceletWeavingNameRoutesEnum::CRUD_INDEX->value);
    Route::get('bracelet-weavings/{id}', [BraceletWeavingController::class, 'show'])->name(BraceletWeavingNameRoutesEnum::CRUD_SHOW->value);
    Route::post('bracelet-weavings', [BraceletWeavingController::class, 'store'])->name(BraceletWeavingNameRoutesEnum::CRUD_POST->value);
    Route::patch('bracelet-weavings/{id}', [BraceletWeavingController::class, 'update'])->name(BraceletWeavingNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('bracelet-weavings/{id}', [BraceletWeavingController::class, 'destroy'])->name(BraceletWeavingNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Bracelet Weavings to Bracelet size
    Route::get('bracelet-weavings/{id}/relationships/weaving', [BraceletWeavingsBraceletSizeRelationshipController::class, 'index'])
        ->name(BraceletWeavingNameRoutesEnum::RELATIONSHIP_TO_WEAVING->value);
    Route::get('bracelet-weavings/{id}/weaving', [BraceletWeavingsBraceletSizeRelatedController::class, 'index'])
        ->name(BraceletWeavingNameRoutesEnum::RELATED_TO_WEAVING->value);
    //  many-to-one Bracelet Weavings to Bracelet
    Route::get('bracelet-weavings/{id}/relationships/bracelet', [BraceletWeavingsBraceletRelationshipController::class, 'index'])
        ->name(BraceletWeavingNameRoutesEnum::RELATIONSHIP_TO_BRACELET->value);
    Route::get('bracelet-weavings/{id}/bracelet', [BraceletWeavingsBraceletRelatedController::class, 'index'])
        ->name(BraceletWeavingNameRoutesEnum::RELATED_TO_BRACELET->value);
});
