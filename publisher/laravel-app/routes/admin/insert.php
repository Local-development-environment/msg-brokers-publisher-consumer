<?php

declare(strict_types=1);

use App\Http\Admin\Insert\Colours\Controllers\ColourController;
use App\Http\Admin\Insert\Colours\Controllers\ColourInsertStonesRelatedController;
use App\Http\Admin\Insert\Colours\Controllers\ColourInsertStonesRelationshipController;
use App\Http\Admin\Insert\Facets\Controllers\FacetController;
use App\Http\Admin\Insert\Facets\Controllers\FacetInsertStonesRelatedController;
use App\Http\Admin\Insert\Facets\Controllers\FacetInsertStonesRelationshipController;
use App\Http\Admin\Insert\GrownStones\Controllers\GrownStoneController;
use App\Http\Admin\Insert\GrownStones\Controllers\GrownStonesStoneFamilyRelatedController;
use App\Http\Admin\Insert\GrownStones\Controllers\GrownStonesStoneFamilyRelationshipController;
use App\Http\Admin\Insert\GrownStones\Controllers\GrownStoneStoneRelatedController;
use App\Http\Admin\Insert\GrownStones\Controllers\GrownStoneStoneRelationshipController;
use App\Http\Admin\Insert\ImitationStones\Controllers\ImitationStoneController;
use App\Http\Admin\Insert\ImitationStones\Controllers\ImitationStoneStoneRelatedController;
use App\Http\Admin\Insert\ImitationStones\Controllers\ImitationStoneStoneRelationshipController;
use App\Http\Admin\Insert\InsertExteriors\Controllers\InsertExteriorController;
use App\Http\Admin\Insert\InsertExteriors\Controllers\InsertExteriorInsertsRelatedController;
use App\Http\Admin\Insert\InsertExteriors\Controllers\InsertExteriorInsertsRelationshipController;
use App\Http\Admin\Insert\InsertExteriors\Controllers\InsertExteriorsStoneColourRelatedController;
use App\Http\Admin\Insert\InsertExteriors\Controllers\InsertExteriorsStoneColourRelationshipController;
use App\Http\Admin\Insert\InsertExteriors\Controllers\InsertExteriorsStoneFacetRelatedController;
use App\Http\Admin\Insert\InsertExteriors\Controllers\InsertExteriorsStoneFacetRelationshipController;
use App\Http\Admin\Insert\InsertExteriors\Controllers\InsertExteriorsStoneRelatedController;
use App\Http\Admin\Insert\InsertExteriors\Controllers\InsertExteriorsStoneRelationshipController;
use App\Http\Admin\Insert\InsertMetrics\Controllers\InsertMetricController;
use App\Http\Admin\Insert\InsertMetrics\Controllers\InsertMetricInsertRelatedController;
use App\Http\Admin\Insert\InsertMetrics\Controllers\InsertMetricInsertRelationshipController;
use App\Http\Admin\Insert\InsertOptionalInfos\Controllers\InsertOptionalInfoController;
use App\Http\Admin\Insert\InsertOptionalInfos\Controllers\InsertOptionalInfoInsertRelatedController;
use App\Http\Admin\Insert\InsertOptionalInfos\Controllers\InsertOptionalInfoInsertRelationshipController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertInsertMetricRelatedController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertInsertMetricRelationshipController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertInsertOptionalInfoRelatedController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertInsertOptionalInfoRelationshipController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertsInsertStoneRelatedController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertsInsertStoneRelationshipController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertsJewelleryRelatedController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertsJewelleryRelationshipController;
use App\Http\Admin\Insert\NaturalStoneGrades\Controllers\NaturalStoneGradeController;
use App\Http\Admin\Insert\NaturalStoneGrades\Controllers\NaturalStoneGradeNaturalStoneRelatedController;
use App\Http\Admin\Insert\NaturalStoneGrades\Controllers\NaturalStoneGradeNaturalStoneRelationshipController;
use App\Http\Admin\Insert\NaturalStoneGrades\Controllers\NaturalStoneGradesStoneGradeRelatedController;
use App\Http\Admin\Insert\NaturalStoneGrades\Controllers\NaturalStoneGradesStoneGradeRelationshipController;
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
use App\Http\Admin\Insert\OpticalEffects\Controllers\OpticalEffectOpticalEffectStonesRelatedController;
use App\Http\Admin\Insert\OpticalEffects\Controllers\OpticalEffectOpticalEffectStonesRelationshipController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\OpticalEffectStoneController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\OpticalEffectStonesOpticalEffectRelatedController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\OpticalEffectStonesOpticalEffectRelationshipController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\OpticalEffectStoneStoneRelatedController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\OpticalEffectStoneStoneRelationshipController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyGrownStonesRelatedController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyGrownStonesRelationshipController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyNaturalStonesRelatedController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyNaturalStonesRelationshipController;
use App\Http\Admin\Insert\StoneGrades\Controllers\StoneGradeController;
use App\Http\Admin\Insert\StoneGrades\Controllers\StoneGradeNaturalStoneGradesRelatedController;
use App\Http\Admin\Insert\StoneGrades\Controllers\StoneGradeNaturalStoneGradesRelationshipController;
use App\Http\Admin\Insert\StoneGroups\Controllers\StoneGroupController;
use App\Http\Admin\Insert\StoneGroups\Controllers\StoneGroupNaturalStonesRelatedController;
use App\Http\Admin\Insert\StoneGroups\Controllers\StoneGroupNaturalStonesRelationshipController;
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
use App\Http\Admin\Insert\Stones\Controllers\StonesTypeOriginStoneRelatedController;
use App\Http\Admin\Insert\Stones\Controllers\StonesTypeOriginStoneRelationshipController;
use App\Http\Admin\Insert\StoneTypeOrigins\Controllers\StoneTypeOriginController;
use App\Http\Admin\Insert\StoneTypeOrigins\Controllers\StoneTypeOriginStonesRelatedController;
use App\Http\Admin\Insert\StoneTypeOrigins\Controllers\StoneTypeOriginStonesRelationshipController;
use Domain\Inserts\Colours\Enums\ColourNameRoutesEnum;
use Domain\Inserts\Facets\Enums\FacetNameRoutesEnum;
use Domain\Inserts\GrownStones\Enums\GrownStoneNameRoutesEnum;
use Domain\Inserts\ImitationStones\Enums\ImitationStoneNameRoutesEnum;
use Domain\Inserts\InsertExteriors\Enums\InsertExteriorNameRoutesEnum;
use Domain\Inserts\InsertMetrics\Enums\InsertMetricNameRoutesEnum;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoNameRoutesEnum;
use Domain\Inserts\Inserts\Enums\InsertNameRoutesEnum;
use Domain\Inserts\NaturalStoneGrades\Enums\NaturalStoneGradeNameRoutsEnum;
use Domain\Inserts\NaturalStones\Enums\NaturalStoneNameRoutesEnum;
use Domain\Inserts\OpticalEffects\Enums\OpticalEffectNameRoutesEnum;
use Domain\Inserts\OpticalEffectStones\Enums\OpticalEffectStoneNameRoutesEnum;
use Domain\Inserts\StoneFamilies\Enums\StoneFamilyNameRoutesEnum;
use Domain\Inserts\StoneGrades\Enums\StoneGradeNameRoutesEnum;
use Domain\Inserts\StoneGroups\Enums\StoneGroupNameRoutesEnum;
use Domain\Inserts\Stones\Enums\StoneNameRoutesEnum;
use Domain\Inserts\TypeOrigins\Enums\TypeOriginNameRoutesEnum;

Route::group([
    'middleware' => 'auth:admin'
], function () {
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

//  one-to-one Insert to InsertMetric
    Route::get('inserts/{id}/relationships/insert-metric', [InsertInsertMetricRelationshipController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATIONSHIP_TO_INSERT_METRIC->value);
    Route::get('inserts/{id}/insert-metric', [InsertInsertMetricRelatedController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATED_TO_INSERT_METRIC->value);

//  many-to-one Inserts to InsertExterior
    Route::get('inserts/{id}/relationships/jewellery', [InsertsJewelleryRelationshipController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATIONSHIP_TO_JEWELLERY->value);
    Route::get('inserts/{id}/jewellery', [InsertsJewelleryRelatedController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATED_TO_JEWELLERY->value);

//  many-to-one Inserts to InsertExterior
    Route::get('inserts/{id}/relationships/insert-exterior', [InsertsInsertStoneRelationshipController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATIONSHIP_TO_INSERT_STONE->value);
    Route::get('inserts/{id}/insert-exterior', [InsertsInsertStoneRelatedController::class, 'index'])
        ->name(InsertNameRoutesEnum::RELATED_TO_INSERT_STONE->value);

    /*************************** INSERT EXTERIORS *************************/
// CRUD
    Route::get('insert-exteriors', [InsertExteriorController::class, 'index'])
        ->name(InsertNameRoutesEnum::CRUD_INDEX->value);
    Route::get('insert-exteriors/{id}', [InsertExteriorController::class, 'show'])
        ->name(InsertNameRoutesEnum::CRUD_SHOW->value);
    Route::post('insert-exteriors', [InsertExteriorController::class, 'store'])
        ->name(InsertNameRoutesEnum::CRUD_POST->value);
    Route::patch('insert-exteriors/{id}', [InsertExteriorController::class, 'update'])
        ->name(InsertNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('insert-exteriors/{id}', [InsertExteriorController::class, 'destroy'])
        ->name(InsertNameRoutesEnum::CRUD_DELETE->value);

// RELATIONSHIPS
//  many-to-one InsertStones to Stone
    Route::get('insert-exteriors/{id}/relationships/stone', [InsertExteriorsStoneRelationshipController::class, 'index'])
        ->name(InsertExteriorNameRoutesEnum::RELATIONSHIP_TO_STONE->value);
    Route::get('insert-exteriors/{id}/stone', [InsertExteriorsStoneRelatedController::class, 'index'])
        ->name(InsertExteriorNameRoutesEnum::RELATED_TO_STONE->value);

//  many-to-one InsertStones to Colour
    Route::get('insert-exteriors/{id}/relationships/colour', [InsertExteriorsStoneColourRelationshipController::class, 'index'])
        ->name(InsertExteriorNameRoutesEnum::RELATIONSHIP_TO_STONE_COLOUR->value);
    Route::get('insert-exteriors/{id}/colour', [InsertExteriorsStoneColourRelatedController::class, 'index'])
        ->name(InsertExteriorNameRoutesEnum::RELATED_TO_STONE_COLOUR->value);

//  many-to-one InsertStones to Facet
    Route::get('insert-exteriors/{id}/relationships/facet', [InsertExteriorsStoneFacetRelationshipController::class, 'index'])
        ->name(InsertExteriorNameRoutesEnum::RELATIONSHIP_TO_STONE_FACET->value);
    Route::get('insert-exteriors/{id}/facet', [InsertExteriorsStoneFacetRelatedController::class, 'index'])
        ->name(InsertExteriorNameRoutesEnum::RELATED_TO_STONE_FACET->value);

//  one-to-many InsertExterior to Inserts
    Route::get('insert-exteriors/{id}/relationships/inserts', [InsertExteriorInsertsRelationshipController::class, 'index'])
        ->name(InsertExteriorNameRoutesEnum::RELATIONSHIP_TO_INSERTS->value);
    Route::get('insert-exteriors/{id}/inserts', [InsertExteriorInsertsRelatedController::class, 'index'])
        ->name(InsertExteriorNameRoutesEnum::RELATED_TO_INSERTS->value);

    /*************************** STONES *************************/
// CRUD
    Route::get('stones', [StoneController::class, 'index'])
        ->name(StoneNameRoutesEnum::CRUD_INDEX->value);
    Route::get('stones/{id}', [StoneController::class, 'show'])
        ->name(StoneNameRoutesEnum::CRUD_SHOW->value);
    Route::post('stones', [StoneController::class, 'store'])
        ->name(StoneNameRoutesEnum::CRUD_POST->value);
    Route::patch('stones/{id}', [StoneController::class, 'update'])
        ->name(StoneNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('stones/{id}', [StoneController::class, 'destroy'])
        ->name(StoneNameRoutesEnum::CRUD_DELETE->value);

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

    /*************************** COLOURS *************************/
// CRUD
    Route::get('insert-colours', [ColourController::class, 'index'])
        ->name(ColourNameRoutesEnum::CRUD_INDEX->value);
    Route::get('insert-colours/{id}', [ColourController::class, 'show'])
        ->name(ColourNameRoutesEnum::CRUD_SHOW->value);
    Route::post('insert-colours', [ColourController::class, 'store'])
        ->name(ColourNameRoutesEnum::CRUD_POST->value);
    Route::patch('insert-colours/{id}', [ColourController::class, 'update'])
        ->name(ColourNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('insert-colours/{id}', [ColourController::class, 'destroy'])
        ->name(ColourNameRoutesEnum::CRUD_DELETE->value);

// RELATIONSHIPS
//  one-to-many Colour InsertStones
    Route::get('insert-colours/{id}/relationships/insert-exteriors', [ColourInsertStonesRelationshipController::class, 'index'])
        ->name(ColourNameRoutesEnum::RELATIONSHIP_TO_INSERT_EXTERIORS->value);
    Route::get('insert-colours/{id}/insert-exteriors', [ColourInsertStonesRelatedController::class, 'index'])
        ->name(ColourNameRoutesEnum::RELATED_TO_INSERT_EXTERIORS->value);

    /*************************** INSERT METRICS *************************/
// CRUD
    Route::get('insert-metrics', [InsertMetricController::class, 'index'])
        ->name(InsertMetricNameRoutesEnum::CRUD_INDEX);
    Route::get('insert-metrics/{id}', [InsertMetricController::class, 'show'])
        ->name(InsertMetricNameRoutesEnum::CRUD_SHOW);
    Route::post('insert-metrics', [InsertMetricController::class, 'store'])
        ->name(InsertMetricNameRoutesEnum::CRUD_POST);
    Route::patch('insert-metrics/{id}', [InsertMetricController::class, 'update'])
        ->name(InsertMetricNameRoutesEnum::CRUD_PATCH);
    Route::delete('insert-metrics/{id}', [InsertMetricController::class, 'destroy'])
        ->name(InsertMetricNameRoutesEnum::CRUD_DELETE);

// RELATIONSHIPS
//  one-to-one InsertMetric to Insert
    Route::get('insert-metrics/{id}/relationships/insert', [InsertMetricInsertRelationshipController::class, 'index'])
        ->name(InsertMetricNameRoutesEnum::RELATIONSHIP_TO_INSERT->value);
    Route::get('insert-metrics/{id}/insert', [InsertMetricInsertRelatedController::class, 'index'])
        ->name(InsertMetricNameRoutesEnum::RELATED_TO_INSERT->value);

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
    Route::get('facets/{id}/relationships/insert-exteriors', [FacetInsertStonesRelationshipController::class, 'index'])
        ->name(FacetNameRoutesEnum::RELATIONSHIP_TO_INSERT_EXTERIORS->value);
    Route::get('facets/{id}/insert-exteriors', [FacetInsertStonesRelatedController::class, 'index'])
        ->name(FacetNameRoutesEnum::RELATED_TO_INSERT_EXTERIORS->value);

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

    /*************************** NATURAL STONES *************************/
// CRUD
    Route::get('natural-stones', [NaturalStoneController::class, 'index'])
        ->name(NaturalStoneNameRoutesEnum::CRUD_INDEX->value);
    Route::get('natural-stones/{id}', [NaturalStoneController::class, 'show'])
        ->name(NaturalStoneNameRoutesEnum::CRUD_SHOW->value);
    Route::post('natural-stones', [NaturalStoneController::class, 'store'])
        ->name(NaturalStoneNameRoutesEnum::CRUD_POST->value);
    Route::patch('natural-stones/{id}', [NaturalStoneController::class, 'update'])
        ->name(NaturalStoneNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('natural-stones/{id}', [NaturalStoneController::class, 'destroy'])
        ->name(NaturalStoneNameRoutesEnum::CRUD_DELETE->value);

// RELATIONSHIPS
//  one-to-one NaturalStone to Stone
    Route::get('natural-stones/{id}/relationships/stone', [
        NaturalStoneStoneRelationshipController::class, 'index'
    ])->name(NaturalStoneNameRoutesEnum::RELATIONSHIP_TO_STONE->value);
    Route::get('natural-stones/{id}/stone', [NaturalStoneStoneRelatedController::class, 'index'])
        ->name(NaturalStoneNameRoutesEnum::RELATED_TO_STONE->value);

//  one-to-one NaturalStone to NaturalStoneGrade
    Route::get('natural-stones/{id}/relationships/natural-stone-grade', [
        NaturalStoneNaturalStoneGradeRelationshipController::class, 'index'
    ])->name(NaturalStoneNameRoutesEnum::RELATIONSHIP_TO_NATURAL_STONE_GRADE->value);
    Route::get('natural-stones/{id}/natural-stone-grade', [NaturalStoneNaturalStoneGradeRelatedController::class, 'index'])
        ->name(NaturalStoneNameRoutesEnum::RELATED_TO_NATURAL_STONE_GRADE->value);

//  many-to-one Natural to StoneGroup
    Route::get('natural-stones/{id}/relationships/stone-group', [
        NaturalStonesStoneGroupRelationshipController::class, 'index'
    ])->name(NaturalStoneNameRoutesEnum::RELATIONSHIP_TO_STONE_GROUP->value);
    Route::get('natural-stones/{id}/stone-group', [NaturalStonesStoneGroupRelatedController::class, 'index'])
        ->name(NaturalStoneNameRoutesEnum::RELATED_TO_STONE_GROUP->value);

//  many-to-one Natural to StoneGroup
    Route::get('natural-stones/{id}/relationships/stone-family', [
        NaturalStonesStoneFamilyRelationshipController::class, 'index'
    ])->name(NaturalStoneNameRoutesEnum::RELATIONSHIP_TO_STONE_FAMILY->value);
    Route::get('natural-stones/{id}/stone-family', [NaturalStonesStoneFamilyRelatedController::class, 'index'])
        ->name(NaturalStoneNameRoutesEnum::RELATED_TO_STONE_FAMILY->value);

    /*************************** NATURAL STONE GRADES *************************/
// CRUD
    Route::get('natural-stone-grades', [NaturalStoneGradeController::class, 'index'])
        ->name(NaturalStoneGradeNameRoutsEnum::CRUD_INDEX->value);
    Route::get('natural-stone-grades/{id}', [NaturalStoneGradeController::class, 'show'])
        ->name(NaturalStoneGradeNameRoutsEnum::CRUD_SHOW->value);
    Route::post('natural-stone-grades', [NaturalStoneGradeController::class, 'store'])
        ->name(NaturalStoneGradeNameRoutsEnum::CRUD_POST->value);
    Route::patch('natural-stone-grades/{id}', [NaturalStoneGradeController::class, 'update'])
        ->name(NaturalStoneGradeNameRoutsEnum::CRUD_PATCH->value);
    Route::delete('natural-stone-grades/{id}', [NaturalStoneGradeController::class, 'destroy'])
        ->name(NaturalStoneGradeNameRoutsEnum::CRUD_DELETE->value);

// RELATIONSHIPS
//  one-to-one NaturalStoneGrade to NaturalStone
    Route::get('natural-stone-grades/{id}/relationships/natural-stone', [
        NaturalStoneGradeNaturalStoneRelationshipController::class, 'index'
    ])->name(NaturalStoneGradeNameRoutsEnum::RELATIONSHIP_TO_NATURAL_STONE->value);
    Route::get('natural-stone-grades/{id}/natural-stone', [NaturalStoneGradeNaturalStoneRelatedController::class, 'index'])
        ->name(NaturalStoneGradeNameRoutsEnum::RELATED_TO_NATURAL_STONE->value);

//  many-to-one NaturalStoneGrade to StoneGrade
    Route::get('natural-stone-grades/{id}/relationships/stone-grade', [
        NaturalStoneGradesStoneGradeRelationshipController::class, 'index'
    ])->name(NaturalStoneGradeNameRoutsEnum::RELATIONSHIP_TO_STONE_GRADE->value);
    Route::get('natural-stone-grades/{id}/stone-grade', [NaturalStoneGradesStoneGradeRelatedController::class, 'index'])
        ->name(NaturalStoneGradeNameRoutsEnum::RELATED_TO_STONE_GRADE->value);

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
        OpticalEffectOpticalEffectStonesRelationshipController::class, 'index'
    ])->name(OpticalEffectNameRoutesEnum::RELATIONSHIP_TO_OPTICAL_EFFECT_STONES->value);
    Route::get('optical-effects/{id}/optical-effect-stones', [
        OpticalEffectOpticalEffectStonesRelatedController::class, 'index'
    ])->name(OpticalEffectNameRoutesEnum::RELATED_TO_OPTICAL_EFFECT_STONES->value);

    /*************************** OPTICAL EFFECT STONES *************************/
// CRUD
    Route::get('optical-effect-stones', [OpticalEffectStoneController::class, 'index'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_INDEX->value);
    Route::get('optical-effect-stones/{id}', [OpticalEffectStoneController::class, 'show'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_SHOW->value);
    Route::post('optical-effect-stones', [OpticalEffectStoneController::class, 'store'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_POST->value);
    Route::patch('optical-effect-stones/{id}', [OpticalEffectStoneController::class, 'update'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('optical-effect-stones/{id}', [OpticalEffectStoneController::class, 'destroy'])
        ->name(OpticalEffectNameRoutesEnum::CRUD_DELETE->value);

// RELATIONSHIPS
//  many-to-one OpticalEffectStones to OpticalEffect
    Route::get('optical-effect-stones/{id}/relationships/optical-effect', [
        OpticalEffectStonesOpticalEffectRelationshipController::class, 'index'
    ])->name(OpticalEffectStoneNameRoutesEnum::RELATIONSHIP_TO_OPTICAL_EFFECT->value);
    Route::get('optical-effect-stones/{id}/optical-effect', [
        OpticalEffectStonesOpticalEffectRelatedController::class, 'index'
    ])->name(OpticalEffectStoneNameRoutesEnum::RELATED_TO_OPTICAL_EFFECT->value);

//  one-to-one OpticalEffectStone to Stone
    Route::get('optical-effect-stones/{id}/relationships/stone', [
        OpticalEffectStoneStoneRelationshipController::class, 'index'
    ])->name(OpticalEffectStoneNameRoutesEnum::RELATIONSHIP_TO_STONE->value);
    Route::get('optical-effect-stones/{id}/stone', [OpticalEffectStoneStoneRelatedController::class, 'index'])
        ->name(OpticalEffectStoneNameRoutesEnum::RELATED_TO_STONE->value);

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
//  one-to-many StoneGrade to NaturalStoneGrades
    Route::get('stone-grades/{id}/relationships/natural-stone-grades', [
        StoneGradeNaturalStoneGradesRelationshipController::class, 'index'
    ])->name(StoneGradeNameRoutesEnum::RELATIONSHIP_TO_NATURAL_STONE_GRADES->value);
    Route::get('stone-grades/{id}/natural-stone-grades', [StoneGradeNaturalStoneGradesRelatedController::class, 'index'])
        ->name(StoneGradeNameRoutesEnum::RELATED_TO_NATURAL_STONE_GRADES->value);

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
    Route::get('stone-groups/{id}/relationships/natural-stones', [StoneGroupNaturalStonesRelationshipController::class, 'index'])
        ->name(StoneGroupNameRoutesEnum::RELATIONSHIP_TO_NATURAL_STONES->value);
    Route::get('stone-groups/{id}/natural-stones', [StoneGroupNaturalStonesRelatedController::class, 'index'])
        ->name(StoneGroupNameRoutesEnum::RELATED_TO_NATURAL_STONES->value);

    /*************************** STONE TYPE ORIGINS *************************/
// CRUD
    Route::get('stone-type-origins', [StoneTypeOriginController::class, 'index'])
        ->name(StoneNameRoutesEnum::CRUD_INDEX->value);
    Route::get('stone-type-origins/{id}', [StoneTypeOriginController::class, 'show'])
        ->name(StoneNameRoutesEnum::CRUD_SHOW->value);
    Route::post('stone-type-origins', [StoneTypeOriginController::class, 'store'])
        ->name(StoneNameRoutesEnum::CRUD_POST->value);
    Route::patch('stone-type-origins/{id}', [StoneTypeOriginController::class, 'update'])
        ->name(StoneNameRoutesEnum::CRUD_PATCH->value);
    Route::delete('stone-type-origins/{id}', [StoneTypeOriginController::class, 'destroy'])
        ->name(StoneNameRoutesEnum::CRUD_DELETE->value);

// RELATIONSHIPS
//  one-to-many StoneTypeOrigin to Stones
    Route::get('stone-type-origins/{id}/relationships/stones', [StoneTypeOriginStonesRelationshipController::class, 'index'])
        ->name(TypeOriginNameRoutesEnum::RELATIONSHIP_TO_STONES->value);
//Route::patch('stone-type-origins/{id}/relationships/stones', [StoneTypeOriginStonesRelationshipController::class, 'update'])
//    ->name('stone-type-origin.relationships.stones');
    Route::get('stone-type-origins/{id}/stones', [StoneTypeOriginStonesRelatedController::class, 'index'])
        ->name(TypeOriginNameRoutesEnum::RELATED_TO_STONES->value);
});