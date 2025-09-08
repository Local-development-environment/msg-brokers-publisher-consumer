<?php

declare(strict_types=1);

use App\Http\Admin\Insert\GrownStones\Controllers\GrownStoneController;
use App\Http\Admin\Insert\ImitationStones\Controllers\ImitationStoneController;
use App\Http\Admin\Insert\Inserts\Controllers\InsertController;
use App\Http\Admin\Insert\NaturalStones\Controllers\NaturalStoneController;
use App\Http\Admin\Insert\StoneColours\Controllers\StoneColourController;
use App\Http\Admin\Insert\StoneFacets\Controllers\StoneFacetController;
use App\Http\Admin\Insert\Stones\Controllers\StoneController;

/*************************** INSERTS *************************/
// CRUD
Route::get('/inserts', [InsertController::class,'index']);
Route::get('/inserts/{id}', [InsertController::class,'show']);
Route::post('/inserts', [InsertController::class,'store']);
Route::patch('/inserts/{id}', [InsertController::class,'update']);
Route::delete('/inserts/{id}', [InsertController::class,'destroy']);

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

/*************************** Natural STONES *************************/
// CRUD
Route::get('/natural-stones', [NaturalStoneController::class,'index']);
Route::get('/natural-stones/{id}', [NaturalStoneController::class,'show']);
Route::post('/natural-stones', [NaturalStoneController::class,'store']);
Route::patch('/natural-stones/{id}', [NaturalStoneController::class,'update']);
Route::delete('/natural-stones/{id}', [NaturalStoneController::class,'destroy']);

// RELATIONSHIPS

/*************************** IMITATION STONES *************************/
// CRUD
Route::get('/imitation-stones', [ImitationStoneController::class,'index']);
Route::get('/imitation-stones/{id}', [ImitationStoneController::class,'show']);
Route::post('/imitation-stones', [ImitationStoneController::class,'store']);
Route::patch('/imitation-stones/{id}', [ImitationStoneController::class,'update']);
Route::delete('/imitation-stones/{id}', [ImitationStoneController::class,'destroy']);

// RELATIONSHIPS