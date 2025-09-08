<?php

declare(strict_types=1);

use App\Http\Admin\Insert\GrownStones\Controllers\GrownStoneController;
use App\Http\Admin\Insert\ImitationStones\Controllers\ImitationStoneController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertController;
use App\Http\Admin\Insert\InsertStones\Controllers\InsertStoneController;
use App\Http\Admin\Insert\NaturalStoneGrades\Controllers\NaturalStoneGradeController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStoneController;
use App\Http\Admin\Insert\OpticalEffects\Controllers\OpticalEffectController;
use App\Http\Admin\Insert\OpticalEffectStones\Controllers\OpticalEffectStoneController;
use App\Http\Admin\Insert\OptionalInfos\Controllers\OptionalInfoController;
use App\Http\Admin\Insert\StoneColours\Controllers\StoneColourController;
use App\Http\Admin\Insert\StoneFacets\Controllers\StoneFacetController;
use App\Http\Admin\Insert\StoneFamilies\Controllers\StoneFamilyController;
use App\Http\Admin\Insert\StoneGrades\Controllers\StoneGradeController;
use App\Http\Admin\Insert\StoneGroups\Controllers\StoneGroupController;
use App\Http\Admin\Insert\StoneMetrics\Controllers\StoneMetricController;
use App\Http\Admin\Insert\Stones\Controllers\StoneController;
use App\Http\Admin\Insert\Stones\Controllers\StonesTypeOriginStoneRelatedController;
use App\Http\Admin\Insert\Stones\Controllers\StonesTypeOriginStoneRelationshipsController;
use App\Http\Admin\Insert\StoneTypeOrigins\Controllers\StoneTypeOriginController;
use App\Http\Admin\Insert\StoneTypeOrigins\Controllers\StoneTypeOriginStonesRelatedController;
use App\Http\Admin\Insert\StoneTypeOrigins\Controllers\StoneTypeOriginStonesRelationshipsController;

/*************************** INSERTS *************************/
// CRUD
Route::get('/inserts', [InsertController::class,'index']);
Route::get('/inserts/{id}', [InsertController::class,'show']);
Route::post('/inserts', [InsertController::class,'store']);
Route::patch('/inserts/{id}', [InsertController::class,'update']);
Route::delete('/inserts/{id}', [InsertController::class,'destroy']);

// RELATIONSHIPS

/*************************** INSERT STONES *************************/
// CRUD
Route::get('/insert-stones', [InsertStoneController::class,'index']);
Route::get('/insert-stones/{id}', [InsertStoneController::class,'show']);
Route::post('/insert-stones', [InsertStoneController::class,'store']);
Route::patch('/insert-stones/{id}', [InsertStoneController::class,'update']);
Route::delete('/insert-stones/{id}', [InsertStoneController::class,'destroy']);

// RELATIONSHIPS

/*************************** STONES *************************/
// CRUD
Route::get('/stones', [StoneController::class,'index']);
Route::get('/stones/{id}', [StoneController::class,'show']);
Route::post('/stones', [StoneController::class,'store']);
Route::patch('/stones/{id}', [StoneController::class,'update']);
Route::delete('/stones/{id}', [StoneController::class,'destroy']);

// RELATIONSHIPS

/*************************** STONE COLOURS *************************/
// CRUD
Route::get('/stone-colours', [StoneColourController::class,'index']);
Route::get('/stone-colours/{id}', [StoneColourController::class,'show']);
Route::post('/stone-colours', [StoneColourController::class,'store']);
Route::patch('/stone-colours/{id}', [StoneColourController::class,'update']);
Route::delete('/stone-colours/{id}', [StoneColourController::class,'destroy']);

// RELATIONSHIPS

/*************************** STONE METRICS *************************/
// CRUD
Route::get('/stone-metrics', [StoneMetricController::class,'index']);
Route::get('/stone-metrics/{id}', [StoneMetricController::class,'show']);
Route::post('/stone-metrics', [StoneMetricController::class,'store']);
Route::patch('/stone-metrics/{id}', [StoneMetricController::class,'update']);
Route::delete('/stone-metrics/{id}', [StoneMetricController::class,'destroy']);

// RELATIONSHIPS

/*************************** STONE FACETS *************************/
// CRUD
Route::get('/stone-facets', [StoneFacetController::class,'index']);
Route::get('/stone-facets/{id}', [StoneFacetController::class,'show']);
Route::post('/stone-facets', [StoneFacetController::class,'store']);
Route::patch('/stone-facets/{id}', [StoneFacetController::class,'update']);
Route::delete('/stone-facets/{id}', [StoneFacetController::class,'destroy']);

// RELATIONSHIPS

/*************************** GROWN STONES *************************/
// CRUD
Route::get('/grown-stones', [GrownStoneController::class,'index']);
Route::get('/grown-stones/{id}', [GrownStoneController::class,'show']);
Route::post('/grown-stones', [GrownStoneController::class,'store']);
Route::patch('/grown-stones/{id}', [GrownStoneController::class,'update']);
Route::delete('/grown-stones/{id}', [GrownStoneController::class,'destroy']);

// RELATIONSHIPS

/*************************** NATURAL STONES *************************/
// CRUD
Route::get('/natural-stones', [NaturalStoneController::class,'index']);
Route::get('/natural-stones/{id}', [NaturalStoneController::class,'show']);
Route::post('/natural-stones', [NaturalStoneController::class,'store']);
Route::patch('/natural-stones/{id}', [NaturalStoneController::class,'update']);
Route::delete('/natural-stones/{id}', [NaturalStoneController::class,'destroy']);

// RELATIONSHIPS

/*************************** NATURAL STONE GRADES *************************/
// CRUD
Route::get('/natural-stone-grades', [NaturalStoneGradeController::class,'index']);
Route::get('/natural-stone-grades/{id}', [NaturalStoneGradeController::class,'show']);
Route::post('/natural-stone-grades', [NaturalStoneGradeController::class,'store']);
Route::patch('/natural-stone-grades/{id}', [NaturalStoneGradeController::class,'update']);
Route::delete('/natural-stone-grades/{id}', [NaturalStoneGradeController::class,'destroy']);

// RELATIONSHIPS

/*************************** IMITATION STONES *************************/
// CRUD
Route::get('/imitation-stones', [ImitationStoneController::class,'index']);
Route::get('/imitation-stones/{id}', [ImitationStoneController::class,'show']);
Route::post('/imitation-stones', [ImitationStoneController::class,'store']);
Route::patch('/imitation-stones/{id}', [ImitationStoneController::class,'update']);
Route::delete('/imitation-stones/{id}', [ImitationStoneController::class,'destroy']);

// RELATIONSHIPS

/*************************** OPTICAL EFFECTS *************************/
// CRUD
Route::get('/optical-effects', [OpticalEffectController::class,'index']);
Route::get('/optical-effects/{id}', [OpticalEffectController::class,'show']);
Route::post('/optical-effects', [OpticalEffectController::class,'store']);
Route::patch('/optical-effects/{id}', [OpticalEffectController::class,'update']);
Route::delete('/optical-effects/{id}', [OpticalEffectController::class,'destroy']);

// RELATIONSHIPS

/*************************** OPTICAL EFFECT STONES *************************/
// CRUD
Route::get('/optical-effect-stones', [OpticalEffectStoneController::class,'index']);
Route::get('/optical-effect-stones/{id}', [OpticalEffectStoneController::class,'show']);
Route::post('/optical-effect-stones', [OpticalEffectStoneController::class,'store']);
Route::patch('/optical-effect-stones/{id}', [OpticalEffectStoneController::class,'update']);
Route::delete('/optical-effect-stones/{id}', [OpticalEffectStoneController::class,'destroy']);

// RELATIONSHIPS

/*************************** OPTIONAL INFOS *************************/
// CRUD
Route::get('/optional-infos', [OptionalInfoController::class,'index']);
Route::get('/optional-infos/{id}', [OptionalInfoController::class,'show']);
Route::post('/optional-infos', [OptionalInfoController::class,'store']);
Route::patch('/optional-infos/{id}', [OptionalInfoController::class,'update']);
Route::delete('/optional-infos/{id}', [OptionalInfoController::class,'destroy']);

// RELATIONSHIPS

/*************************** STONE GRADES *************************/
// CRUD
Route::get('/stone-grades', [StoneGradeController::class,'index']);
Route::get('/stone-grades/{id}', [StoneGradeController::class,'show']);
Route::post('/stone-grades', [StoneGradeController::class,'store']);
Route::patch('/stone-grades/{id}', [StoneGradeController::class,'update']);
Route::delete('/stone-grades/{id}', [StoneGradeController::class,'destroy']);

// RELATIONSHIPS

/*************************** STONE FAMILIES *************************/
// CRUD
Route::get('/stone-families', [StoneFamilyController::class,'index']);
Route::get('/stone-families/{id}', [StoneFamilyController::class,'show']);
Route::post('/stone-families', [StoneFamilyController::class,'store']);
Route::patch('/stone-families/{id}', [StoneFamilyController::class,'update']);
Route::delete('/stone-families/{id}', [StoneFamilyController::class,'destroy']);

// RELATIONSHIPS

/*************************** STONE GROUPS *************************/
// CRUD
Route::get('/stone-groups', [StoneGroupController::class,'index']);
Route::get('/stone-groups/{id}', [StoneGroupController::class,'show']);
Route::post('/stone-groups', [StoneGroupController::class,'store']);
Route::patch('/stone-groups/{id}', [StoneGroupController::class,'update']);
Route::delete('/stone-groups/{id}', [StoneGroupController::class,'destroy']);

// RELATIONSHIPS
//  many-to-one Stones to StoneTypeOrigin
Route::get('/stones/{id}/relationships/stone-type-origin', [StonesTypeOriginStoneRelationshipsController::class, 'index'])
    ->name('stones.relationships.stone-type-origin');
//Route::patch('/stones/{id}/relationships/stone-type-origin', [StonesTypeOriginStoneRelationshipsController::class, 'update'])
//    ->name('stones.relationships.stone-type-origin');
Route::get('/stones/{id}/stone-type-origin', [StonesTypeOriginStoneRelatedController::class, 'index'])
    ->name('stones.stone-type-origin');

/*************************** STONE TYPE ORIGINS *************************/
// CRUD
Route::get('/stone-type-origins', [StoneTypeOriginController::class,'index']);
Route::get('/stone-type-origins/{id}', [StoneTypeOriginController::class,'show']);
Route::post('/stone-type-origins', [StoneTypeOriginController::class,'store']);
Route::patch('/stone-type-origins/{id}', [StoneTypeOriginController::class,'update']);
Route::delete('/stone-type-origins/{id}', [StoneTypeOriginController::class,'destroy']);

// RELATIONSHIPS
//  one-to-many StoneTypeOrigin to Stones
Route::get('/stone-type-origins/{id}/relationships/stones', [StoneTypeOriginStonesRelationshipsController::class, 'index'])
    ->name('stone-type-origin.relationships.stones');
//Route::patch('/stone-type-origins/{id}/relationships/stones', [StoneTypeOriginStonesRelationshipsController::class, 'update'])
//    ->name('stone-type-origin.relationships.stones');
Route::get('/stone-type-origins/{id}/stones', [StoneTypeOriginStonesRelatedController::class, 'index'])
    ->name('stone-type-origin.stones');