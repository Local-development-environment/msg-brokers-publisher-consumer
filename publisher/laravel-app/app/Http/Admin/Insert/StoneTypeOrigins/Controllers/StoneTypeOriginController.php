<?php

namespace App\Http\Admin\Insert\StoneTypeOrigins\Controllers;

use App\Http\Admin\Insert\StoneTypeOrigins\Resources\StoneTypeOriginCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\TypeOrigins\Services\StoneTypeOriginService;
use Illuminate\Http\Request;

class StoneTypeOriginController extends Controller
{
    public function __construct(public StoneTypeOriginService $insertService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $items = $this->insertService->index($data);

        return (new StoneTypeOriginCollection($items))->response();
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
