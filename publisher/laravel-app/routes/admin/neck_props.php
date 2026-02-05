<?php
declare(strict_types=1);

use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadBeadMetricsRelatedController;
use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadBeadMetricsRelationshipController;
use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadController;
use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadJewelleryRelatedController;
use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadsBeadBaseRelatedController;
use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadsBeadBaseRelationshipController;
use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadsClaspRelatedController;
use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadsClaspRelationshipController;
use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadsNeckSizesRelatedController;
use App\Http\Admin\SpecProperties\Beads\Bead\Controllers\BeadsNeckSizesRelationshipController;
use app\Http\Admin\SpecProperties\Beads\BeadBase\Controllers\BeadBaseBeadsRelatedController;
use app\Http\Admin\SpecProperties\Beads\BeadBase\Controllers\BeadBaseBeadsRelationshipController;
use App\Http\Admin\SpecProperties\Beads\BeadBase\Controllers\BeadBaseController;
use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Controllers\BeadMetricController;
use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Controllers\BeadMetricsBeadRelatedController;
use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Controllers\BeadMetricsBeadRelationshipController;
use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Controllers\BeadMetricsBeadSizeRelatedController;
use App\Http\Admin\SpecProperties\Beads\BeadMetrics\Controllers\BeadMetricsBeadSizeRelationshipController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainChainMetricsRelatedController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainChainMetricsRelationshipController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainChainWeavingsRelatedController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainChainWeavingsRelationshipController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainJewelleryRelatedController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainsClaspRelatedController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainsClaspRelationshipController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainsNeckSizesRelatedController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainsNeckSizesRelationshipController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainsWeavingsRelatedController;
use App\Http\Admin\SpecProperties\Chains\Chain\Controllers\ChainsWeavingsRelationshipController;
use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Controllers\ChainMetricController;
use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Controllers\ChainMetricsChainRelatedController;
use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Controllers\ChainMetricsChainRelationshipController;
use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Controllers\ChainMetricsNeckSizeRelatedController;
use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Controllers\ChainMetricsNeckSizeRelationshipController;
use App\Http\Admin\SpecProperties\Chains\ChainWeaving\Controllers\ChainWeavingController;
use App\Http\Admin\SpecProperties\Chains\ChainWeaving\Controllers\ChainWeavingsChainRelatedController;
use App\Http\Admin\SpecProperties\Chains\ChainWeaving\Controllers\ChainWeavingsChainRelationshipController;
use App\Http\Admin\SpecProperties\Chains\ChainWeaving\Controllers\ChainWeavingsWeavingRelatedController;
use App\Http\Admin\SpecProperties\Chains\ChainWeaving\Controllers\ChainWeavingsWeavingRelationshipController;
use App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers\NecklaceController;
use App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers\NecklaceJewelleryRelatedController;
use App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers\NecklaceJewelleryRelationshipController;
use App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers\NecklaceNecklaceMetricsRelatedController;
use App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers\NecklaceNecklaceMetricsRelationshipController;
use App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers\NecklacesClaspRelatedController;
use App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers\NecklacesClaspRelationshipController;
use App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers\NecklacesNeckSizesRelatedController;
use App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers\NecklacesNeckSizesRelationshipController;
use App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Controllers\NecklaceMetricController;
use App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Controllers\NecklaceMetricsNecklaceRelatedController;
use App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Controllers\NecklaceMetricsNecklaceRelationshipController;
use App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Controllers\NecklaceMetricsNeckSizeRelatedController;
use App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Controllers\NecklaceMetricsNeckSizeRelationshipController;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Enums\BeadBaseNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Enums\BeadMetricNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Enums\BeadNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainMetrics\Enums\ChainMetricNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Enums\ChainNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\ChainWeavings\Enums\ChainWeavingNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Enums\NecklaceMetricNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Enums\NecklaceNameRoutesEnum;

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
    //  one-to-many Bead to BeadMetrics
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

    /*************************** NECKLACE METRICS *************************/
    // CRUD
    Route::get('necklace-metrics', [NecklaceMetricController::class, 'index'])->name(NecklaceMetricNameRoutesEnum::CRUD_INDEX->value);
    Route::get('necklace-metrics/{id}', [NecklaceMetricController::class, 'show'])->name(NecklaceMetricNameRoutesEnum::CRUD_SHOW->value);
    Route::post('necklace-metrics', [NecklaceMetricController::class, 'store'])->name(NecklaceMetricNameRoutesEnum::CRUD_POST->value);
    Route::patch('necklace-metrics/{id}', [NecklaceMetricController::class, 'update'])->name(NecklaceMetricNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('necklace-metrics/{id}', [NecklaceMetricController::class, 'destroy'])->name(NecklaceMetricNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Necklace Metrics to Necklace
    Route::get('necklace-metrics/{id}/relationships/necklace', [NecklaceMetricsNecklaceRelationshipController::class, 'index'])
        ->name(NecklaceMetricNameRoutesEnum::RELATIONSHIP_TO_NECKLACE->value);
    Route::get('necklace-metrics/{id}/necklace', [NecklaceMetricsNecklaceRelatedController::class, 'index'])
        ->name(NecklaceMetricNameRoutesEnum::RELATED_TO_NECKLACE->value);
    //  many-to-one Necklace Metrics to Neck Size
    Route::get('necklace-metrics/{id}/relationships/neck-size', [NecklaceMetricsNeckSizeRelationshipController::class, 'index'])
        ->name(NecklaceMetricNameRoutesEnum::RELATIONSHIP_TO_NECK_SIZE->value);
    Route::get('necklace-metrics/{id}/neck-size', [NecklaceMetricsNeckSizeRelatedController::class, 'index'])
        ->name(NecklaceMetricNameRoutesEnum::RELATED_TO_NECK_SIZE->value);

    /*************************** CHAINS *************************/
    // CRUD
    Route::get('chains', [ChainController::class, 'index'])->name(ChainNameRoutesEnum::CRUD_INDEX->value);
    Route::get('chains/{id}', [ChainController::class, 'show'])->name(ChainNameRoutesEnum::CRUD_SHOW->value);
    Route::post('chains', [ChainController::class, 'store'])->name(ChainNameRoutesEnum::CRUD_POST->value);
    Route::patch('chains/{id}', [ChainController::class, 'update'])->name(ChainNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('chains/{id}', [ChainController::class, 'destroy'])->name(ChainNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Chain to Jewellery
    Route::get('chains/{id}/relationships/jewellery', [ChainJewelleryRelationshipController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('chains/{id}/jewellery', [ChainJewelleryRelatedController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATED_TO_JEWELLERY->value);
    //  many-to-many Chains to Neck Sizes
    Route::get('chains/{id}/relationships/neck-sizes', [ChainsNeckSizesRelationshipController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATIONSHIP_TO_NECK_SIZES->value);
    Route::get('chains/{id}/neck-sizes', [ChainsNeckSizesRelatedController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATED_TO_NECK_SIZES->value);
    //  many-to-many Chains to Weavings
    Route::get('chains/{id}/relationships/weavings', [ChainsWeavingsRelationshipController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATIONSHIP_TO_WEAVINGS->value);
    Route::get('chains/{id}/weavings', [ChainsWeavingsRelatedController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATED_TO_WEAVINGS->value);
    //  one-to-many Chain to Chain Metrics
    Route::get('chains/{id}/relationships/chain-metrics', [ChainChainMetricsRelationshipController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATIONSHIP_TO_CHAIN_METRICS->value);
    Route::get('chains/{id}/chain-metrics', [ChainChainMetricsRelatedController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATED_TO_CHAIN_METRICS->value);
    //  one-to-many Chain to Chain Weavings
    Route::get('chains/{id}/relationships/chain-weavings', [ChainChainWeavingsRelationshipController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATIONSHIP_TO_CHAIN_WEAVINGS->value);
    Route::get('chains/{id}/chain-weavings', [ChainChainWeavingsRelatedController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATED_TO_CHAIN_WEAVINGS->value);
    //  many-to-one Chains to Clasp
    Route::get('chains/{id}/relationships/clasp', [ChainsClaspRelationshipController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATIONSHIP_TO_CLASP->value);
    Route::get('chains/{id}/clasp', [ChainsClaspRelatedController::class, 'index'])
        ->name(ChainNameRoutesEnum::RELATED_TO_CLASP->value);

    /*************************** CHAIN METRICS *************************/
    // CRUD
    Route::get('chain-metrics', [ChainMetricController::class, 'index'])
        ->name(ChainMetricNameRoutesEnum::CRUD_INDEX->value);
    Route::get('chain-metrics/{id}', [ChainMetricController::class, 'show'])
        ->name(ChainMetricNameRoutesEnum::CRUD_SHOW->value);
    Route::post('chain-metrics', [ChainMetricController::class, 'store'])
        ->name(ChainMetricNameRoutesEnum::CRUD_POST->value);
    Route::patch('chain-metrics/{id}', [ChainMetricController::class, 'update'])
        ->name(ChainMetricNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('chain-metrics/{id}', [ChainMetricController::class, 'destroy'])
        ->name(ChainMetricNameRoutesEnum::CRUD_DELETE->value);

    //  many-to-one ChainMetrics to Chain
    Route::get('chain-metrics/{id}/relationships/chain', [ChainMetricsChainRelationshipController::class, 'index'])
        ->name(ChainMetricNameRoutesEnum::RELATIONSHIP_TO_CHAIN->value);
    Route::get('chain-metrics/{id}/chain', [ChainMetricsChainRelatedController::class, 'index'])
        ->name(ChainMetricNameRoutesEnum::RELATED_TO_CHAIN->value);
    //  many-to-one ChainMetrics to NeckSize
    Route::get('chain-metrics/{id}/relationships/neck-size', [ChainMetricsNeckSizeRelationshipController::class, 'index'])
        ->name(ChainMetricNameRoutesEnum::RELATIONSHIP_TO_NECK_SIZE->value);
    Route::get('chain-metrics/{id}/neck-size', [ChainMetricsNeckSizeRelatedController::class, 'index'])
        ->name(ChainMetricNameRoutesEnum::RELATED_TO_NECK_SIZE->value);

    /*************************** CHAIN WEAVING *************************/
    // CRUD
    Route::get('chain-weavings', [ChainWeavingController::class, 'index'])
        ->name(ChainWeavingNameRoutesEnum::CRUD_INDEX->value);
    Route::get('chain-weavings/{id}', [ChainWeavingController::class, 'show'])
        ->name(ChainWeavingNameRoutesEnum::CRUD_SHOW->value);
    Route::post('chain-weavings', [ChainWeavingController::class, 'store'])
        ->name(ChainWeavingNameRoutesEnum::CRUD_POST->value);
    Route::patch('chain-weavings/{id}', [ChainWeavingController::class, 'update'])
        ->name(ChainWeavingNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('chain-weavings/{id}', [ChainWeavingController::class, 'destroy'])
        ->name(ChainWeavingNameRoutesEnum::CRUD_DELETE->value);

    //  many-to-one ChainWeavings to Chain
    Route::get('chain-weavings/{id}/relationships/chain', [ChainWeavingsChainRelationshipController::class, 'index'])
        ->name(ChainWeavingNameRoutesEnum::RELATIONSHIP_TO_CHAIN->value);
    Route::get('chain-weavings/{id}/chain', [ChainWeavingsChainRelatedController::class, 'index'])
        ->name(ChainWeavingNameRoutesEnum::RELATED_TO_CHAIN->value);
    //  many-to-one ChainWeavings to Weaving
    Route::get('chain-weavings/{id}/relationships/weaving', [ChainWeavingsWeavingRelationshipController::class, 'index'])
        ->name(ChainWeavingNameRoutesEnum::RELATIONSHIP_TO_WEAVING->value);
    Route::get('chain-weavings/{id}/weaving', [ChainWeavingsWeavingRelatedController::class, 'index'])
        ->name(ChainWeavingNameRoutesEnum::RELATED_TO_WEAVING->value);
});
