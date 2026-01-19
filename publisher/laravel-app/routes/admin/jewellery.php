<?php

declare(strict_types=1);

use App\Http\Admin\Jewellery\Categories\Controllers\JewelleryCategoryController;
use App\Http\Admin\Jewellery\Categories\Controllers\JewelleryCategoryJewelleriesRelatedController;
use App\Http\Admin\Jewellery\Categories\Controllers\JewelleryCategoryJewelleriesRelationshipController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleriesJewelleryCategoryRelatedController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleriesJewelleryCategoryRelationshipController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryBeadRelatedController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryBeadRelationshipController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryBraceletRelatedController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryBraceletRelationshipController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryBroochRelatedController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryBroochRelationshipController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryChainRelatedController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryChainRelationshipController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryCharmPendantRelatedController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryCharmPendantRelationshipController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryPendantRelatedController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryPendantRelationshipController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryRingRelatedController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryRingRelationshipController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryTieClipRelatedController;
use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryTieClipRelationshipController;
use Domain\Jewelleries\Jewelleries\Enums\JewelleryNameRoutesEnum;
use Domain\Jewelleries\JewelleryCategories\Enums\JewelleryCategoryNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {
    /*************************** JEWELLERIES *************************/
// CRUD
    Route::get('jewelleries', [JewelleryController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::CRUD_INDEX->value);
    Route::get('jewelleries/{id}', [JewelleryController::class, 'show'])
        ->name(JewelleryNameRoutesEnum::CRUD_SHOW->value);
    Route::post('jewelleries', [JewelleryController::class, 'store'])
        ->name(JewelleryNameRoutesEnum::CRUD_POST->value);
    Route::patch('jewelleries', [JewelleryController::class, 'update'])
        ->name(JewelleryNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('jewelleries', [JewelleryController::class, 'destroy'])
        ->name(JewelleryNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one Jewellery to Bead
    Route::get('jewelleries/{id}/relationships/bead', [JewelleryBeadRelationshipController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATIONSHIP_TO_BEAD->value);
    Route::get('jewelleries/{id}/bead', [JewelleryBeadRelatedController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATED_TO_BEAD->value);
    //  many-to-one Jewelleries to JewelleryCategory
    Route::get('jewelleries/{id}/relationships/jewellery-category', [JewelleriesJewelleryCategoryRelationshipController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY_CATEGORY->value);
    Route::get('jewelleries/{id}/jewellery-category', [JewelleriesJewelleryCategoryRelatedController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATED_TO_JEWELLERY_CATEGORY->value);
    //  one-to-one Jewellery to Bracelet
    Route::get('jewelleries/{id}/relationships/bracelet', [JewelleryBraceletRelationshipController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATIONSHIP_TO_BRACELET->value);
    Route::get('jewelleries/{id}/bracelet', [JewelleryBraceletRelatedController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATED_TO_BRACELET->value);
    //  one-to-one Jewellery to Chain
    Route::get('jewelleries/{id}/relationships/chain', [JewelleryChainRelationshipController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATIONSHIP_TO_CHAIN->value);
    Route::get('jewelleries/{id}/chain', [JewelleryChainRelatedController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATED_TO_CHAIN->value);
    //  one-to-one Jewellery to Ring
    Route::get('jewelleries/{id}/relationships/ring', [JewelleryRingRelationshipController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATIONSHIP_TO_RING->value);
    Route::get('jewelleries/{id}/ring', [JewelleryRingRelatedController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATED_TO_RING->value);
    //  one-to-one Jewellery to Charm Pendant
    Route::get('jewelleries/{id}/relationships/charm-pendant', [JewelleryCharmPendantRelationshipController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATIONSHIP_TO_CHARM_PENDANT->value);
    Route::get('jewelleries/{id}/charm-pendant', [JewelleryCharmPendantRelatedController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATED_TO_CHARM_PENDANT->value);
    //  one-to-one Jewellery to Pendant
    Route::get('jewelleries/{id}/relationships/pendant', [JewelleryPendantRelationshipController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATIONSHIP_TO_PENDANT->value);
    Route::get('jewelleries/{id}/pendant', [JewelleryPendantRelatedController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATED_TO_PENDANT->value);
    //  one-to-one Jewellery to Tie Clip
    Route::get('jewelleries/{id}/relationships/tie-clip', [JewelleryTieClipRelationshipController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATIONSHIP_TO_TIE_CLIP->value);
    Route::get('jewelleries/{id}/tie-clip', [JewelleryTieClipRelatedController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATED_TO_TIE_CLIP->value);
    //  one-to-one Jewellery to Brooch
    Route::get('jewelleries/{id}/relationships/brooch', [JewelleryBroochRelationshipController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATIONSHIP_TO_BROOCH->value);
    Route::get('jewelleries/{id}/brooch', [JewelleryBroochRelatedController::class, 'index'])
        ->name(JewelleryNameRoutesEnum::RELATED_TO_BROOCH->value);

    /*************************** JEWELLERY CATEGORIES *************************/
    // CRUD
    Route::get('jewellery-categories', [JewelleryCategoryController::class, 'index'])
        ->name(JewelleryCategoryNameRoutesEnum::CRUD_INDEX->value);
    Route::get('jewellery-categories/{id}', [JewelleryCategoryController::class, 'show'])
        ->name(JewelleryCategoryNameRoutesEnum::CRUD_SHOW->value);
    Route::post('jewellery-categories', [JewelleryCategoryController::class, 'store'])
        ->name(JewelleryCategoryNameRoutesEnum::CRUD_POST->value);
    Route::patch('jewellery-categories', [JewelleryCategoryController::class, 'update'])
        ->name(JewelleryCategoryNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('jewellery-categories', [JewelleryCategoryController::class, 'destroy'])
        ->name(JewelleryCategoryNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many Jewellery Category to Jewelleries
    Route::get('jewellery-categories/{id}/relationships/jewelleries', [JewelleryCategoryJewelleriesRelationshipController::class, 'index'])
        ->name(JewelleryCategoryNameRoutesEnum::RELATIONSHIP_TO_JEWELLERIES->value);
    Route::get('jewellery-categories/{id}/jewelleries', [JewelleryCategoryJewelleriesRelatedController::class, 'index'])
        ->name(JewelleryCategoryNameRoutesEnum::RELATED_TO_JEWELLERIES->value);
});
