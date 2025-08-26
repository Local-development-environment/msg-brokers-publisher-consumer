<?php

namespace App\Http\Site\Inserts\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Site\Inserts\Resources\VInsertResource;
use Domain\Inserts\InsertViews\Models\VInsert;
use Illuminate\Http\Request;

class VInsertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vInserts = VInsert::take(10)->get();
//        $vInserts = VInsert::take(10)->get();
//        dd(VInsertResource::collection($vInserts));
        return VInsertResource::collection($vInserts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
