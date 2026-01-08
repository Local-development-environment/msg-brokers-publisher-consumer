<?php

declare(strict_types=1);

use App\Http\Admin\Insert\Colours\Controllers\StoneColourController;
use App\Http\Admin\Insert\Colours\Controllers\StoneColourStoneExteriorsRelatedController;
use App\Http\Admin\Insert\Colours\Controllers\StoneColourStoneExteriorsRelationshipController;
use App\Http\Admin\Insert\Facets\Controllers\FacetController;
use App\Http\Admin\Insert\Facets\Controllers\FacetInsertStonesRelatedController;
use App\Http\Admin\Insert\Facets\Controllers\FacetInsertStonesRelationshipController;
use App\Http\Admin\Insert\GroupGrades\Controllers\GroupGradeController;
use App\Http\Admin\Insert\GroupGrades\Controllers\GroupGradeNaturalStoneRelatedController;
use App\Http\Admin\Insert\GroupGrades\Controllers\GroupGradeNaturalStoneRelationshipController;
use App\Http\Admin\Insert\GroupGrades\Controllers\GroupGradesStoneGroupRelatedController;
use App\Http\Admin\Insert\GroupGrades\Controllers\GroupGradesStoneGroupRelationshipController;
use App\Http\Admin\Insert\GroupGrades\Controllers\GroupGradeStoneItemGradeRelatedController;
use App\Http\Admin\Insert\GrownStones\Controllers\GrownStoneController;
use App\Http\Admin\Insert\GrownStones\Controllers\GrownStonesStoneFamilyRelatedController;
use App\Http\Admin\Insert\GrownStones\Controllers\GrownStonesStoneFamilyRelationshipController;
use App\Http\Admin\Insert\GrownStones\Controllers\GrownStoneStoneRelatedController;
use App\Http\Admin\Insert\GrownStones\Controllers\GrownStoneStoneRelationshipController;
use App\Http\Admin\Insert\ImitationStones\Controllers\ImitationStoneController;
use App\Http\Admin\Insert\ImitationStones\Controllers\ImitationStoneStoneRelatedController;
use App\Http\Admin\Insert\ImitationStones\Controllers\ImitationStoneStoneRelationshipController;
use App\Http\Admin\Insert\InsertOptionalInfos\Controllers\InsertOptionalInfoController;
use App\Http\Admin\Insert\InsertOptionalInfos\Controllers\InsertOptionalInfoInsertRelatedController;
use App\Http\Admin\Insert\InsertOptionalInfos\Controllers\InsertOptionalInfoInsertRelationshipController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertInsertOptionalInfoRelatedController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertInsertOptionalInfoRelationshipController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertsInsertStoneRelatedController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertsInsertStoneRelationshipController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertsJewelleryRelatedController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertsJewelleryRelationshipController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStoneController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStoneNaturalStoneGradeRelatedController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStoneNaturalStoneGradeRelationshipController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStonesStoneFamilyRelatedController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStonesStoneFamilyRelationshipController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStonesStoneGroupRelatedController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStonesStoneGroupRelationshipController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStoneStoneRelatedController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStoneStoneRelationshipController;
use App\Http\Admin\Insert\OpticalEffects\Controllers\OpticalEffectController;
use App\Http\Admin\Insert\OpticalEffects\Controllers\OpticalEffectStoneOpticalEffectsRelatedController;
use App\Http\Admin\Insert\OpticalEffects\Controllers\OpticalEffectStoneOpticalEffectsRelationshipController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\StoneOpticalEffectController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\StoneOpticalEffectsOpticalEffectRelatedController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\StoneOpticalEffectsOpticalEffectRelationshipController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\StoneOpticalEffectStoneRelatedController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\StoneOpticalEffectStoneRelationshipController;
use App\Http\Admin\Insert\StoneExteriors\Controllers\StoneExteriorController;
use App\Http\Admin\Insert\StoneExteriors\Controllers\StoneExteriorInsertsRelatedController;
use App\Http\Admin\Insert\StoneExteriors\Controllers\StoneExteriorInsertsRelationshipController;
use App\Http\Admin\Insert\StoneExteriors\Controllers\StoneExteriorsStoneColourRelatedController;
use App\Http\Admin\Insert\StoneExteriors\Controllers\StoneExteriorsStoneColourRelationshipController;
use App\Http\Admin\Insert\StoneExteriors\Controllers\StoneExteriorsStoneFacetRelatedController;
use App\Http\Admin\Insert\StoneExteriors\Controllers\StoneExteriorsStoneFacetRelationshipController;
use App\Http\Admin\Insert\StoneExteriors\Controllers\StoneExteriorsStoneRelatedController;
use App\Http\Admin\Insert\StoneExteriors\Controllers\StoneExteriorsStoneRelationshipController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyGrownStonesRelatedController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyGrownStonesRelationshipController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyNaturalStonesRelatedController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyNaturalStonesRelationshipController;
use App\Http\Admin\Insert\StoneGrades\Controllers\StoneGradeController;
use App\Http\Admin\Insert\StoneGrades\Controllers\StoneGradeStoneItemGradesRelatedController;
use App\Http\Admin\Insert\StoneGrades\Controllers\StoneGradeStoneItemGradesRelationshipController;
use App\Http\Admin\Insert\StoneGroups\Controllers\StoneGroupController;
use App\Http\Admin\Insert\StoneGroups\Controllers\StoneGroupNaturalStonesRelatedController;
use App\Http\Admin\Insert\StoneGroups\Controllers\StoneGroupNaturalStonesRelationshipController;
use App\Http\Admin\Insert\StoneItemGrades\Controllers\StoneItemGradeController;
use App\Http\Admin\Insert\StoneItemGrades\Controllers\StoneItemGradeGroupGradeRelatedController;
use App\Http\Admin\Insert\StoneItemGrades\Controllers\StoneItemGradeGroupGradeRelationshipController;
use App\Http\Admin\Insert\StoneItemGrades\Controllers\StoneItemGradesStoneGradeRelationshipController;
use App\Http\Admin\Insert\Stones\Controllers\StoneController;
use App\Http\Admin\Insert\Stones\Controllers\StoneGrownStoneRelatedController;
use App\Http\Admin\Insert\Stones\Controllers\StoneGrownStoneRelationshipController;
use App\Http\Admin\Insert\Stones\Controllers\StoneImitationStoneRelatedController;
use App\Http\Admin\Insert\Stones\Controllers\StoneImitationStoneRelationshipController;
use App\Http\Admin\Insert\Stones\Controllers\StoneNaturalStoneRelatedController;
use App\Http\Admin\Insert\Stones\Controllers\StoneNaturalStoneRelationshipController;
use App\Http\Admin\Insert\Stones\Controllers\StonesColoursRelatedController;
use App\Http\Admin\Insert\Stones\Controllers\StonesColoursRelationshipController;
use App\Http\Admin\Insert\Stones\Controllers\StonesFacetsRelatedController;
use App\Http\Admin\Insert\Stones\Controllers\StonesFacetsRelationshipController;
use App\Http\Admin\Insert\Stones\Controllers\StoneStoneExteriorsRelatedController;
use App\Http\Admin\Insert\Stones\Controllers\StoneStoneExteriorsRelationshipController;
use App\Http\Admin\Insert\Stones\Controllers\StonesTypeOriginStoneRelatedController;
use App\Http\Admin\Insert\Stones\Controllers\StonesTypeOriginStoneRelationshipController;
use App\Http\Admin\Insert\TypeOrigins\Controllers\TypeOriginController;
use App\Http\Admin\Insert\TypeOrigins\Controllers\TypeOriginStonesRelatedController;
use App\Http\Admin\Insert\TypeOrigins\Controllers\TypeOriginStonesRelationshipController;
use Domain\Inserts\Facets\Enums\FacetNameRoutesEnum;
use Domain\Inserts\GroupGrades\Enums\GroupGradeNameRoutesEnum;
use Domain\Inserts\GrownStones\Enums\GrownStoneNameRoutesEnum;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneNameRoutesEnum;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoNameRoutesEnum;
use Domain\Inserts\Inserts\Enums\InsertNameRoutesEnum;
use Domain\Inserts\NaturalStones\Enums\NatureStoneNameRoutesEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectNameRoutesEnum;
use Domain\Inserts\OpticalEffectStones\Enums\StoneOpticalEffectNameRoutesEnum;
use Domain\Inserts\StoneColours\Enums\StoneColourNameRoutesEnum;
use Domain\Inserts\StoneExteriors\Enums\StoneExteriorNameRoutesEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyNameRoutesEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeNameRoutesEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupNameRoutesEnum;
use Domain\Inserts\StoneItemGrades\Enums\StoneItemGradeNameRoutesEnum;
use Domain\Inserts\Stones\Enums\StoneNameRoutesEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {

    /*************************** COLOURS *************************/
    // CRUD
    Route::get('stone-colours', [StoneColourController::class, 'index'])
        ->name(StoneColourNameRoutesEnum::CRUD_INDEX->value);
    Route::get('stone-colours/{id}', [StoneColourController::class, 'show'])
        ->name(StoneColourNameRoutesEnum::CRUD_SHOW->value);
    Route::post('stone-colours', [StoneColourController::class, 'store'])
        ->name(StoneColourNameRoutesEnum::CRUD_POST->value);
    Route::patch('stone-colours/{id}', [StoneColourController::class, 'update'])
        ->name(StoneColourNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('stone-colours/{id}', [StoneColourController::class, 'destroy'])
        ->name(StoneColourNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many StoneColour StoneExteriors
    Route::get('stone-colours/{id}/relationships/stone-exteriors', [StoneColourStoneExteriorsRelationshipController::class, 'index'])
        ->name(StoneColourNameRoutesEnum::RELATIONSHIP_TO_STONE_EXTERIORS->value);
    Route::get('stone-colours/{id}/stone-exteriors', [StoneColourStoneExteriorsRelatedController::class, 'index'])
        ->name(StoneColourNameRoutesEnum::RELATED_TO_STONE_EXTERIORS->value);

    /*************************** FACETS *************************/
    // CRUD
    Route::get('facets', [FacetController::class, 'index'])
        ->name(FacetNameRoutesEnum::CRUD_INDEX->value);
    Route::get('facets/{id}', [FacetController::class, 'show'])
        ->name(FacetNameRoutesEnum::CRUD_SHOW->value);
    Route::post('facets', [FacetController::class, 'store'])
        ->name(FacetNameRoutesEnum::CRUD_POST->value);
    Route::patch('facets/{id}', [FacetController::class, 'update'])
        ->name(FacetNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('facets/{id}', [FacetController::class, 'destroy'])
        ->name(FacetNameRoutesEnum::CRUD_DELETE->value);
        // RELATIONSHIPS
    //  one-to-many Facet to InsertExteriors
    Route::get('facets/{id}/relationships/stone-exteriors', [FacetInsertStonesRelationshipController::class, 'index'])
        ->name(FacetNameRoutesEnum::RELATIONSHIP_TO_STONE_EXTERIORS->value);
    Route::get('facets/{id}/stone-exteriors', [FacetInsertStonesRelatedController::class, 'index'])
        ->name(FacetNameRoutesEnum::RELATED_TO_STONE_EXTERIORS->value);

    /*************************** GROUP GRADES *************************/
    // CRUD
    Route::get('group-grades', [GroupGradeController::class, 'index'])
        ->name(GroupGradeNameRoutesEnum::CRUD_INDEX->value);
    Route::get('group-grades/{id}', [GroupGradeController::class, 'show'])
        ->name(GroupGradeNameRoutesEnum::CRUD_SHOW->value);
    Route::post('group-grades', [GroupGradeController::class, 'store'])
        ->name(GroupGradeNameRoutesEnum::CRUD_POST->value);
    Route::patch('group-grades/{id}', [GroupGradeController::class, 'update'])
        ->name(GroupGradeNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('group-grades/{id}', [GroupGradeController::class, 'destroy'])
        ->name(GroupGradeNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one GroupGrades to StoneGroup
    Route::get('group-grades/{id}/relationships/stone-group', [GroupGradesStoneGroupRelationshipController::class, 'index'])
        ->name(GroupGradeNameRoutesEnum::RELATIONSHIP_TO_STONE_GROUP->value);
    Route::get('group-grades/{id}/stone-group', [GroupGradesStoneGroupRelatedController::class, 'index'])
        ->name(GroupGradeNameRoutesEnum::RELATED_TO_STONE_GROUP->value);
    //  one-to-one GroupGrades to StoneItemGrade
    Route::get('group-grades/{id}/relationships/stone-item-grade', [GroupGradeStoneItemGradeRelatedController::class, 'index'])
        ->name(GroupGradeNameRoutesEnum::RELATIONSHIP_TO_STONE_ITEM_GRADE->value);
    Route::get('group-grades/{id}/stone-item-grade', [GroupGradeStoneItemGradeRelatedController::class, 'index'])
        ->name(GroupGradeNameRoutesEnum::RELATED_TO_STONE_ITEM_GRADE->value);
    //  one-to-one GroupGrades to StoneItemGrade
    Route::get('group-grades/{id}/relationships/natural-stone', [GroupGradeNaturalStoneRelationshipController::class, 'index'])
        ->name(GroupGradeNameRoutesEnum::RELATIONSHIP_TO_NATURAL_STONE->value);
    Route::get('group-grades/{id}/natural-stone', [GroupGradeNaturalStoneRelatedController::class, 'index'])
        ->name(GroupGradeNameRoutesEnum::RELATED_TO_NATURAL_STONE->value);

    /*************************** GROWN STONES *************************/
    // CRUD
    Route::get('grown-stones', [GrownStoneController::class, 'index'])
        ->name(GrownStoneNameRoutesEnum::CRUD_INDEX->value);
    Route::get('grown-stones/{id}', [GrownStoneController::class, 'show'])
        ->name(GrownStoneNameRoutesEnum::CRUD_SHOW->value);
    Route::post('grown-stones', [GrownStoneController::class, 'store'])
        ->name(GrownStoneNameRoutesEnum::CRUD_POST->value);
    Route::patch('grown-stones/{id}', [GrownStoneController::class, 'update'])
        ->name(GrownStoneNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('grown-stones/{id}', [GrownStoneController::class, 'destroy'])
        ->name(GrownStoneNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one GrownStone to Stone
    Route::get('grown-stones/{id}/relationships/stone', [GrownStoneStoneRelationshipController::class, 'index'])
        ->name(GrownStoneNameRoutesEnum::RELATIONSHIP_TO_STONE->value);
    Route::get('grown-stones/{id}/stone', [GrownStoneStoneRelatedController::class, 'index'])
        ->name(GrownStoneNameRoutesEnum::RELATED_TO_STONE->value);
    //  many-to-one GrownStones to StoneFamily
    Route::get('grown-stones/{id}/relationships/stone-family', [GrownStonesStoneFamilyRelationshipController::class, 'index'])
        ->name(GrownStoneNameRoutesEnum::RELATIONSHIP_TO_STONE_FAMILY->value);
    Route::get('grown-stones/{id}/stone-family', [GrownStonesStoneFamilyRelatedController::class, 'index'])
        ->name(GrownStoneNameRoutesEnum::RELATED_TO_STONE_FAMILY->value);

    /*************************** IMITATION STONES *************************/
    // CRUD
    Route::get('imitation-stones', [ImitationStoneController::class, 'index'])
        ->name(ImitationStoneNameRoutesEnum::CRUD_INDEX->value);
    Route::get('imitation-stones/{id}', [ImitationStoneController::class, 'show'])
        ->name(ImitationStoneNameRoutesEnum::CRUD_SHOW->value);
    Route::post('imitation-stones', [ImitationStoneController::class, 'store'])
        ->name(ImitationStoneNameRoutesEnum::CRUD_POST->value);
    Route::patch('imitation-stones/{id}', [ImitationStoneController::class, 'update'])
        ->name(ImitationStoneNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('imitation-stones/{id}', [ImitationStoneController::class, 'destroy'])
        ->name(ImitationStoneNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one ImitationStone to Stone
    Route::get('imitation-stones/{id}/relationships/stone', [ImitationStoneStoneRelationshipController::class, 'index'])
        ->name(ImitationStoneNameRoutesEnum::RELATIONSHIP_TO_STONE->value);
    //Route::patch('imitation-stones/{id}/relationships/stone', [ImitationStoneStoneRelationshipController::class, 'update'])
    //    ->name('stone-type-origin.relationships.stones');
    Route::get('imitation-stones/{id}/stone', [ImitationStoneStoneRelatedController::class, 'index'])
        ->name(ImitationStoneNameRoutesEnum::RELATED_TO_STONE->value);

    /*************************** INSERTS *************************/
// CRUD
    Route::get('inserts', [InsertController::class, 'index'])->name(InsertNameRoutesEnum::CRUD_INDEX->value);
    Route::get('inserts/{id}', [InsertController::class, 'show'])->name(InsertNameRoutesEnum::CRUD_SHOW->value);
    Route::post('inserts', [InsertController::class, 'store'])->name(InsertNameRoutesEnum::CRUD_POST->value);
    Route::patch('inserts/{id}', [InsertController::class, 'update'])->name(InsertNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('inserts/{id}', [InsertController::class, 'destroy'])->name(InsertNameRoutesEnum::CRUD_DELETE->value);

// RELATIONSHIPS
//  one-to-one Insert to InsertOptionalInfo
    Route::get('inserts/{id}/relationships/insert-optional-info', [InsertInsertOptionalInfoRelationshipController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATIONSHIP_TO_INSERT_OPTIONAL_INFO->value);
    Route::get('inserts/{id}/insert-optional-info', [InsertInsertOptionalInfoRelatedController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATED_TO_INSERT_OPTIONAL_INFO->value);

//  many-to-one Inserts to StoneExterior
    Route::get('inserts/{id}/relationships/jewellery', [InsertsJewelleryRelationshipController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('inserts/{id}/jewellery', [InsertsJewelleryRelatedController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATED_TO_JEWELLERY->value);

//  many-to-one Inserts to StoneExterior
    Route::get('inserts/{id}/relationships/stone-exterior', [InsertsInsertStoneRelationshipController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATIONSHIP_TO_INSERT_STONE->value);
    Route::get('inserts/{id}/stone-exterior', [InsertsInsertStoneRelatedController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATED_TO_INSERT_STONE->value);

    /*************************** INSERT OPTIONAL INFOS *************************/
    // CRUD
    Route::get('insert-optional-infos', [InsertOptionalInfoController::class, 'index'])
        ->name(InsertOptionalInfoNameRoutesEnum::CRUD_INDEX->value);
    Route::get('insert-optional-infos/{id}', [InsertOptionalInfoController::class, 'show'])
        ->name(InsertOptionalInfoNameRoutesEnum::CRUD_SHOW->value);
    Route::post('insert-optional-infos', [InsertOptionalInfoController::class, 'store'])
        ->name(InsertOptionalInfoNameRoutesEnum::CRUD_POST->value);
    Route::patch('insert-optional-infos/{id}', [InsertOptionalInfoController::class, 'update'])
        ->name(InsertOptionalInfoNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('insert-optional-infos/{id}', [InsertOptionalInfoController::class, 'destroy'])
        ->name(InsertOptionalInfoNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one InsertOptionalInfo to Insert
    Route::get('insert-optional-infos/{id}/relationships/insert', [InsertOptionalInfoInsertRelationshipController::class, 'index'])
        ->name(InsertOptionalInfoNameRoutesEnum::RELATIONSHIP_TO_INSERT->value);
    Route::get('insert-optional-infos/{id}/insert', [InsertOptionalInfoInsertRelatedController::class, 'index'])
        ->name(InsertOptionalInfoNameRoutesEnum::RELATED_TO_INSERT->value);

    /*************************** NATURAL STONES *************************/
    // CRUD
    Route::get('natural-stones', [NaturalStoneController::class, 'index'])
        ->name(NatureStoneNameRoutesEnum::CRUD_INDEX->value);
    Route::get('natural-stones/{id}', [NaturalStoneController::class, 'show'])
        ->name(NatureStoneNameRoutesEnum::CRUD_SHOW->value);
    Route::post('natural-stones', [NaturalStoneController::class, 'store'])
        ->name(NatureStoneNameRoutesEnum::CRUD_POST->value);
    Route::patch('natural-stones/{id}', [NaturalStoneController::class, 'update'])
        ->name(NatureStoneNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('natural-stones/{id}', [NaturalStoneController::class, 'destroy'])
        ->name(NatureStoneNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-one NaturalStone to Stone
    Route::get('natural-stones/{id}/relationships/stone', [
        NaturalStoneStoneRelationshipController::class, 'index'
    ])->name(NatureStoneNameRoutesEnum::RELATIONSHIP_TO_STONE->value);
    Route::get('natural-stones/{id}/stone', [NaturalStoneStoneRelatedController::class, 'index'])
        ->name(NatureStoneNameRoutesEnum::RELATED_TO_STONE->value);

    //  one-to-one NaturalStone to GroupGrade
    Route::get('natural-stones/{id}/relationships/natural-stone-grade', [
        NaturalStoneNaturalStoneGradeRelationshipController::class, 'index'
    ])->name(NatureStoneNameRoutesEnum::RELATIONSHIP_TO_NATURAL_STONE_GRADE->value);
    Route::get('natural-stones/{id}/natural-stone-grade', [NaturalStoneNaturalStoneGradeRelatedController::class, 'index'])
        ->name(NatureStoneNameRoutesEnum::RELATED_TO_NATURAL_STONE_GRADE->value);

    //  many-to-one Natural to StoneGroup
    Route::get('natural-stones/{id}/relationships/stone-group', [
        NaturalStonesStoneGroupRelationshipController::class, 'index'
    ])->name(NatureStoneNameRoutesEnum::RELATIONSHIP_TO_STONE_GROUP->value);
    Route::get('natural-stones/{id}/stone-group', [NaturalStonesStoneGroupRelatedController::class, 'index'])
        ->name(NatureStoneNameRoutesEnum::RELATED_TO_STONE_GROUP->value);

    //  many-to-one Natural to StoneGroup
    Route::get('natural-stones/{id}/relationships/stone-family', [
        NaturalStonesStoneFamilyRelationshipController::class, 'index'
    ])->name(NatureStoneNameRoutesEnum::RELATIONSHIP_TO_STONE_FAMILY->value);
    Route::get('natural-stones/{id}/stone-family', [NaturalStonesStoneFamilyRelatedController::class, 'index'])
        ->name(NatureStoneNameRoutesEnum::RELATED_TO_STONE_FAMILY->value);

    /*************************** OPTICAL EFFECTS *************************/
    // CRUD
    Route::get('optical-effects', [OpticalEffectController::class, 'index'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_INDEX->value);
    Route::get('optical-effects/{id}', [OpticalEffectController::class, 'show'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_SHOW->value);
    Route::post('optical-effects', [OpticalEffectController::class, 'store'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_POST->value);
    Route::patch('optical-effects/{id}', [OpticalEffectController::class, 'update'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('optical-effects/{id}', [OpticalEffectController::class, 'destroy'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many OpticalEffect to OpticalEffectStones
    Route::get('optical-effects/{id}/relationships/optical-effect-stones', [
        OpticalEffectStoneOpticalEffectsRelationshipController::class, 'index'
    ])->name(OpticalEffectNameRoutesEnum::RELATIONSHIP_TO_STONE_OPTICAL_EFFECTS->value);
    Route::get('optical-effects/{id}/optical-effect-stones', [
        OpticalEffectStoneOpticalEffectsRelatedController::class, 'index'
    ])->name(OpticalEffectNameRoutesEnum::RELATED_TO_STONE_OPTICAL_EFFECTS->value);

    /*************************** STONES *************************/
    // CRUD
    Route::get('stones', [StoneController::class, 'index'])->name(StoneNameRoutesEnum::CRUD_INDEX->value);
    Route::get('stones/{id}', [StoneController::class, 'show'])->name(StoneNameRoutesEnum::CRUD_SHOW->value);
    Route::post('stones', [StoneController::class, 'store'])->name(StoneNameRoutesEnum::CRUD_POST->value);
    Route::patch('stones/{id}', [StoneController::class, 'update'])->name(StoneNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('stones/{id}', [StoneController::class, 'destroy'])->name(StoneNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one Stones to StoneTypeOrigin
    Route::get('stones/{id}/relationships/stone-type-origin', [StonesTypeOriginStoneRelationshipController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATIONSHIP_TO_STONE_TYPE_ORIGIN->value);
    Route::get('stones/{id}/stone-type-origin', [StonesTypeOriginStoneRelatedController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATED_TO_STONE_TYPE_ORIGIN->value);

    //  one-to-one Stone to ImitationStone
    Route::get('stones/{id}/relationships/imitation-stone', [StoneImitationStoneRelationshipController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATIONSHIP_TO_IMITATION_STONE->value);
    Route::get('stones/{id}/imitation-stone', [StoneImitationStoneRelatedController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATED_TO_IMITATION_STONE->value);

    //  one-to-one Stone to GrownStone
    Route::get('stones/{id}/relationships/grown-stone', [StoneGrownStoneRelationshipController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATIONSHIP_TO_GROWN_STONE->value);
    Route::get('stones/{id}/grown-stone', [StoneGrownStoneRelatedController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATED_TO_GROWN_STONE->value);

    //  one-to-one Stone to NaturalStone
    Route::get('stones/{id}/relationships/natural-stone', [StoneNaturalStoneRelationshipController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATIONSHIP_TO_NATURAL_STONE->value);
    Route::get('stones/{id}/natural-stone', [StoneNaturalStoneRelatedController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATED_TO_NATURAL_STONE->value);

    //  many-to-many Stones to Facets
    Route::get('stones/{id}/relationships/facets', [StonesFacetsRelationshipController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATIONSHIP_TO_FACETS->value);
    Route::get('stones/{id}/stone-facets', [StonesFacetsRelatedController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATED_TO_FACETS->value);

    //  many-to-many Stones to Colours
    Route::get('stones/{id}/relationships/colours', [StonesColoursRelationshipController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATIONSHIP_TO_COLOURS->value);
    Route::get('stones/{id}/colours', [StonesColoursRelatedController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATED_TO_COLOURS->value);

    //  one-to-many Stone StoneExteriors
    Route::get('stones/{id}/relationships/stone-exteriors', [StoneStoneExteriorsRelationshipController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATIONSHIP_TO_STONE_EXTERIORS->value);
    Route::get('stones/{id}/stone-exteriors', [StoneStoneExteriorsRelatedController::class, 'index'])
        ->name(StoneNameRoutesEnum::RELATED_TO_STONE_EXTERIORS->value);

    /*************************** STONE EXTERIORS *************************/
    // CRUD
    Route::get('stone-exteriors', [StoneExteriorController::class, 'index'])
        ->name(InsertNameRoutesEnum::CRUD_INDEX->value);
    Route::get('stone-exteriors/{id}', [StoneExteriorController::class, 'show'])
        ->name(InsertNameRoutesEnum::CRUD_SHOW->value);
    Route::post('stone-exteriors', [StoneExteriorController::class, 'store'])
        ->name(InsertNameRoutesEnum::CRUD_POST->value);
    Route::patch('stone-exteriors/{id}', [StoneExteriorController::class, 'update'])
        ->name(InsertNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('stone-exteriors/{id}', [StoneExteriorController::class, 'destroy'])
        ->name(InsertNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one InsertStones to Stone
    Route::get('stone-exteriors/{id}/relationships/stone', [StoneExteriorsStoneRelationshipController::class, 'index'])
        ->name(StoneExteriorNameRoutesEnum::RELATIONSHIP_TO_STONE->value);
    Route::get('stone-exteriors/{id}/stone', [StoneExteriorsStoneRelatedController::class, 'index'])
        ->name(StoneExteriorNameRoutesEnum::RELATED_TO_STONE->value);

    //  many-to-one InsertStones to GoldenColour
    Route::get('stone-exteriors/{id}/relationships/colour', [StoneExteriorsStoneColourRelationshipController::class, 'index'])
        ->name(StoneExteriorNameRoutesEnum::RELATIONSHIP_TO_STONE_COLOUR->value);
    Route::get('stone-exteriors/{id}/colour', [StoneExteriorsStoneColourRelatedController::class, 'index'])
        ->name(StoneExteriorNameRoutesEnum::RELATED_TO_STONE_COLOUR->value);

    //  many-to-one InsertStones to Facet
    Route::get('stone-exteriors/{id}/relationships/facet', [StoneExteriorsStoneFacetRelationshipController::class, 'index'])
        ->name(StoneExteriorNameRoutesEnum::RELATIONSHIP_TO_STONE_FACET->value);
    Route::get('stone-exteriors/{id}/facet', [StoneExteriorsStoneFacetRelatedController::class, 'index'])
        ->name(StoneExteriorNameRoutesEnum::RELATED_TO_STONE_FACET->value);

    //  one-to-many StoneExterior to Inserts
    Route::get('stone-exteriors/{id}/relationships/inserts', [StoneExteriorInsertsRelationshipController::class, 'index'])
        ->name(StoneExteriorNameRoutesEnum::RELATIONSHIP_TO_INSERTS->value);
    Route::get('stone-exteriors/{id}/inserts', [StoneExteriorInsertsRelatedController::class, 'index'])
        ->name(StoneExteriorNameRoutesEnum::RELATED_TO_INSERTS->value);

    /*************************** STONE FAMILIES *************************/
    // CRUD
    Route::get('stone-families', [StoneFamilyController::class, 'index'])
        ->name(StoneFamilyNameRoutesEnum::CRUD_INDEX->value);
    Route::get('stone-families/{id}', [StoneFamilyController::class, 'show'])
        ->name(StoneFamilyNameRoutesEnum::CRUD_SHOW->value);
    Route::post('stone-families', [StoneFamilyController::class, 'store'])
        ->name(StoneFamilyNameRoutesEnum::CRUD_POST->value);
    Route::patch('stone-families/{id}', [StoneFamilyController::class, 'update'])
        ->name(StoneFamilyNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('stone-families/{id}', [StoneFamilyController::class, 'destroy'])
        ->name(StoneFamilyNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many StoneFamily to GrownStones
    Route::get('stone-families/{id}/relationships/grown-stones', [StoneFamilyGrownStonesRelationshipController::class, 'index'])
        ->name(StoneFamilyNameRoutesEnum::RELATIONSHIP_TO_GROWN_STONES->value);
    Route::get('stone-families/{id}/grown-stones', [StoneFamilyGrownStonesRelatedController::class, 'index'])
        ->name(StoneFamilyNameRoutesEnum::RELATED_TO_GROWN_STONES->value);

    //  one-to-many StoneFamily to NaturalStones
    Route::get('stone-families/{id}/relationships/natural-stones', [StoneFamilyNaturalStonesRelationshipController::class, 'index'])
        ->name(StoneFamilyNameRoutesEnum::RELATIONSHIP_TO_NATURAL_STONES->value);
    Route::get('stone-families/{id}/natural-stones', [StoneFamilyNaturalStonesRelatedController::class, 'index'])
        ->name(StoneFamilyNameRoutesEnum::RELATED_TO_NATURAL_STONES->value);

    /*************************** STONE GRADES *************************/
    // CRUD
    Route::get('stone-grades', [StoneGradeController::class, 'index'])
        ->name(StoneGradeNameRoutesEnum::CRUD_INDEX->value);
    Route::get('stone-grades/{id}', [StoneGradeController::class, 'show'])
        ->name(StoneGradeNameRoutesEnum::CRUD_SHOW->value);
    Route::post('stone-grades', [StoneGradeController::class, 'store'])
        ->name(StoneGradeNameRoutesEnum::CRUD_POST->value);
    Route::patch('stone-grades/{id}', [StoneGradeController::class, 'update'])
        ->name(StoneGradeNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('stone-grades/{id}', [StoneGradeController::class, 'destroy'])
        ->name(StoneGradeNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many StoneGrade to StoneItemGrades
    Route::get('stone-grades/{id}/relationships/stone-item-grades', [
        StoneGradeStoneItemGradesRelationshipController::class, 'index'
    ])->name(StoneGradeNameRoutesEnum::RELATIONSHIP_TO_STONE_ITEM_GRADES->value);
    Route::get('stone-grades/{id}/stone-item-grades', [StoneGradeStoneItemGradesRelatedController::class, 'index'])
        ->name(StoneGradeNameRoutesEnum::RELATED_TO_STONE_ITEM_GRADES->value);

    /*************************** STONE GROUPS *************************/
    // CRUD
    Route::get('stone-groups', [StoneGroupController::class, 'index'])
        ->name(StoneGroupNameRoutesEnum::CRUD_INDEX->value);
    Route::get('stone-groups/{id}', [StoneGroupController::class, 'show'])
        ->name(StoneGroupNameRoutesEnum::CRUD_SHOW->value);
    Route::post('stone-groups', [StoneGroupController::class, 'store'])
        ->name(StoneGroupNameRoutesEnum::CRUD_POST->value);
    Route::patch('stone-groups/{id}', [StoneGroupController::class, 'update'])
        ->name(StoneGroupNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('stone-groups/{id}', [StoneGroupController::class, 'destroy'])
        ->name(StoneGroupNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  one-to-many StoneGroup to NaturalStones
    Route::get('stone-groups/{id}/relationships/group-grades', [StoneGroupNaturalStonesRelationshipController::class, 'index'])
        ->name(StoneGroupNameRoutesEnum::RELATIONSHIP_TO_GROUP_GRADES->value);
    Route::get('stone-groups/{id}/group-grades', [StoneGroupNaturalStonesRelatedController::class, 'index'])
        ->name(StoneGroupNameRoutesEnum::RELATED_TO_GROUP_GRADES->value);

    /*************************** STONE ITEM GRADES *************************/
    // CRUD
    Route::get('stone-item-grades', [StoneItemGradeController::class, 'index'])
        ->name(StoneItemGradeNameRoutesEnum::CRUD_INDEX->value);
    Route::get('stone-item-grades/{id}', [StoneItemGradeController::class, 'show'])
        ->name(StoneItemGradeNameRoutesEnum::CRUD_SHOW->value);
    Route::post('stone-item-grades', [StoneItemGradeController::class, 'store'])
        ->name(StoneItemGradeNameRoutesEnum::CRUD_POST->value);
    Route::patch('stone-item-grades/{id}', [StoneItemGradeController::class, 'update'])
        ->name(StoneItemGradeNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('stone-item-grades/{id}', [StoneItemGradeController::class, 'destroy'])
        ->name(StoneItemGradeNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one StoneItemGrades to StoneGrade
    Route::get('stone-item-grades/{id}/relationships/stone-grade', [
        StoneItemGradesStoneGradeRelationshipController::class, 'index'
    ])->name(StoneItemGradeNameRoutesEnum::RELATIONSHIP_TO_STONE_GRADE->value);
    Route::get('stone-item-grades/{id}/stone-grade', [StoneGradeStoneItemGradesRelatedController::class, 'index'])
        ->name(StoneItemGradeNameRoutesEnum::RELATED_TO_STONE_GRADE->value);
    //  one-to-one StoneItemGrade to GroupGrade
    Route::get('stone-item-grades/{id}/relationships/group-grade', [
        StoneItemGradeGroupGradeRelationshipController::class, 'index'
    ])->name(StoneItemGradeNameRoutesEnum::RELATIONSHIP_TO_GROUP_GRADE->value);
    Route::get('stone-item-grades/{id}/group-grade', [StoneItemGradeGroupGradeRelatedController::class, 'index'])
        ->name(StoneItemGradeNameRoutesEnum::RELATED_TO_GROUP_GRADE->value);

    /*************************** STONE OPTICAL EFFECTS *************************/
    // CRUD
    Route::get('stone-optical-effects', [StoneOpticalEffectController::class, 'index'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_INDEX->value);
    Route::get('stone-optical-effects/{id}', [StoneOpticalEffectController::class, 'show'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_SHOW->value);
    Route::post('stone-optical-effects', [StoneOpticalEffectController::class, 'store'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_POST->value);
    Route::patch('stone-optical-effects/{id}', [StoneOpticalEffectController::class, 'update'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('stone-optical-effects/{id}', [StoneOpticalEffectController::class, 'destroy'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_DELETE->value);

    // RELATIONSHIPS
    //  many-to-one StoneOpticalEffects to OpticalEffect
    Route::get('stone-optical-effects/{id}/relationships/optical-effect', [
        StoneOpticalEffectsOpticalEffectRelationshipController::class, 'index'
    ])->name(StoneOpticalEffectNameRoutesEnum::RELATIONSHIP_TO_OPTICAL_EFFECT->value);
    Route::get('stone-optical-effects/{id}/optical-effect', [
        StoneOpticalEffectsOpticalEffectRelatedController::class, 'index'
    ])->name(StoneOpticalEffectNameRoutesEnum::RELATED_TO_OPTICAL_EFFECT->value);

    //  one-to-one StoneOpticalEffect to Stone
    Route::get('stone-optical-effects/{id}/relationships/stone', [
        StoneOpticalEffectStoneRelationshipController::class, 'index'
    ])->name(StoneOpticalEffectNameRoutesEnum::RELATIONSHIP_TO_STONE->value);
    Route::get('stone-optical-effects/{id}/stone', [StoneOpticalEffectStoneRelatedController::class, 'index'])
        ->name(StoneOpticalEffectNameRoutesEnum::RELATED_TO_STONE->value);

    /*************************** TYPE ORIGINS *************************/
// CRUD
    Route::get('type-origins', [TypeOriginController::class, 'index'])
        ->name(TypeOriginNameRoutesEnum::CRUD_INDEX->value);
    Route::get('type-origins/{id}', [TypeOriginController::class, 'show'])
        ->name(TypeOriginNameRoutesEnum::CRUD_SHOW->value);
    Route::post('type-origins', [TypeOriginController::class, 'store'])
        ->name(TypeOriginNameRoutesEnum::CRUD_POST->value);
    Route::patch('type-origins/{id}', [TypeOriginController::class, 'update'])
        ->name(TypeOriginNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('type-origins/{id}', [TypeOriginController::class, 'destroy'])
        ->name(TypeOriginNameRoutesEnum::CRUD_DELETE->value);

// RELATIONSHIPS
//  one-to-many TypeOrigin to Stones
    Route::get('type-origins/{id}/relationships/stones', [TypeOriginStonesRelationshipController::class, 'index'])
        ->name(TypeOriginNameRoutesEnum::RELATIONSHIP_TO_STONES->value);
//Route::patch('type-origins/{id}/relationships/stones', [TypeOriginStonesRelationshipController::class, 'update'])
//    ->name('type-origin.relationships.stones');
    Route::get('type-origins/{id}/stones', [TypeOriginStonesRelatedController::class, 'index'])
        ->name(TypeOriginNameRoutesEnum::RELATED_TO_STONES->value);
});
