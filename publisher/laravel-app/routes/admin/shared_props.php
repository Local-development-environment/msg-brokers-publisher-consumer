<?php

declare(strict_types=1);

use App\Http\Admin\SharedProperty\BaseWeavings\Controllers\BaseWeavingController;
use App\Http\Admin\SharedProperty\BaseWeavings\Controllers\BaseWeavingWeavingsRelatedController;
use App\Http\Admin\SharedProperty\BaseWeavings\Controllers\BaseWeavingWeavingsRelationshipController;
use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspBeadsRelatedController;
use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspBeadsRelationshipController;
use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspBraceletsRelatedController;
use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspBraceletsRelationshipController;
use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspChainsRelatedController;
use App\Http\Admin\SharedProperty\Clasps\Controllers\ClaspChainsRelationshipController;
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
use App\Http\Admin\SharedProperty\Weaving\Controllers\WeavingBraceletWeavingsRelatedController;
use App\Http\Admin\SharedProperty\Weaving\Controllers\WeavingBraceletWeavingsRelationshipController;
use App\Http\Admin\SharedProperty\Weaving\Controllers\WeavingController;
use App\Http\Admin\SharedProperty\Weaving\Controllers\WeavingsBaseWeavingRelatedController;
use App\Http\Admin\SharedProperty\Weaving\Controllers\WeavingsBaseWeavingRelationshipController;
use App\Http\Admin\SharedProperty\Weaving\Controllers\WeavingsBraceletsRelatedController;
use App\Http\Admin\SharedProperty\Weaving\Controllers\WeavingsBraceletsRelationshipController;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\BaseWeavings\Enums\BaseWeavingNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Clasps\Enums\ClaspNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Enums\LengthNameNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Enums\NeckSizeNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\Weavings\Enums\WeavingNameRoutesEnum;

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
    //  one-to-many Clasp to Bracelets
    Route::get('clasps/{id}/relationships/bracelets', [ClaspBraceletsRelationshipController::class, 'index'])
        ->name(ClaspNameRoutesEnum::RELATIONSHIP_TO_BRACELETS->value);
    Route::get('clasps/{id}/bracelets', [ClaspBraceletsRelatedController::class, 'index'])
        ->name(ClaspNameRoutesEnum::RELATED_TO_BRACELETS->value);
    //  one-to-many Clasp to Chains
    Route::get('clasps/{id}/relationships/chains', [ClaspChainsRelationshipController::class, 'index'])
        ->name(ClaspNameRoutesEnum::RELATIONSHIP_TO_CHAINS->value);
    Route::get('clasps/{id}/chains', [ClaspChainsRelatedController::class, 'index'])
        ->name(ClaspNameRoutesEnum::RELATED_TO_CHAINS->value);

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
        ->name(LengthNameNameRoutesEnum::RELATIONSHIP_TO_NECK_SIZES->value);
    Route::get('length-names/{id}/bead-sizes', [LengthNameBeadSizesRelatedController::class, 'index'])
        ->name(LengthNameNameRoutesEnum::RELATED_TO_NECK_SIZES->value);

    /*************************** NECK SIZES *************************/
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

    /*************************** WEAVINGS *************************/
    // CRUD
    Route::get('weavings', [WeavingController::class, 'index'])->name(WeavingNameRoutesEnum::CRUD_INDEX->value);
    Route::get('weavings/{id}', [WeavingController::class, 'show'])->name(WeavingNameRoutesEnum::CRUD_SHOW->value);
    Route::post('weavings', [WeavingController::class, 'store'])->name(WeavingNameRoutesEnum::CRUD_POST->value);
    Route::patch('weavings/{id}', [WeavingController::class, 'update'])->name(WeavingNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('weavings/{id}', [WeavingController::class, 'destroy'])->name(WeavingNameRoutesEnum::CRUD_DELETE->value);

    //  one-to-many Weaving to Bracelet Weavings
    Route::get('weavings/{id}/relationships/bracelet-weavings', [WeavingBraceletWeavingsRelationshipController::class, 'index'])
        ->name(WeavingNameRoutesEnum::RELATIONSHIP_TO_BRACELET_WEAVINGS->value);
    Route::get('weavings/{id}/bracelet-weavings', [WeavingBraceletWeavingsRelatedController::class, 'index'])
        ->name(WeavingNameRoutesEnum::RELATED_TO_BRACELET_WEAVINGS->value);
    // many-to-many Weavings to Bracelets
    Route::get('weavings/{id}/relationships/bracelets', [WeavingsBraceletsRelationshipController::class, 'index'])
        ->name(WeavingNameRoutesEnum::RELATIONSHIP_TO_BRACELETS->value);
    Route::get('weavings/{id}/bracelets', [WeavingsBraceletsRelatedController::class, 'index'])
        ->name(WeavingNameRoutesEnum::RELATED_TO_BRACELETS->value);
    // many-to-many Weavings to Bracelets
    Route::get('weavings/{id}/relationships/base-weaving', [WeavingsBaseWeavingRelationshipController::class, 'index'])
        ->name(WeavingNameRoutesEnum::RELATIONSHIP_TO_BASE_WEAVING->value);
    Route::get('weavings/{id}/base-weaving', [WeavingsBaseWeavingRelatedController::class, 'index'])
        ->name(WeavingNameRoutesEnum::RELATED_TO_BASE_WEAVING->value);

    /*************************** BASE WEAVINGS *************************/
    // CRUD
    Route::get('base-weavings', [BaseWeavingController::class, 'index'])->name(BaseWeavingNameRoutesEnum::CRUD_INDEX->value);
    Route::get('base-weavings/{id}', [BaseWeavingController::class, 'show'])->name(BaseWeavingNameRoutesEnum::CRUD_SHOW->value);
    Route::post('base-weavings', [BaseWeavingController::class, 'store'])->name(BaseWeavingNameRoutesEnum::CRUD_POST->value);
    Route::patch('base-weavings/{id}', [BaseWeavingController::class, 'update'])->name(BaseWeavingNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('base-weavings/{id}', [BaseWeavingController::class, 'destroy'])->name(BaseWeavingNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Base Weaving to Weavings
    Route::get('base-weavings/{id}/relationships/weavings', [BaseWeavingWeavingsRelationshipController::class, 'index'])
        ->name(BaseWeavingNameRoutesEnum::RELATIONSHIP_TO_WEAVINGS->value);
    Route::get('base-weavings/{id}/weavings', [BaseWeavingWeavingsRelatedController::class, 'index'])
        ->name(BaseWeavingNameRoutesEnum::RELATED_TO_WEAVINGS->value);
});
