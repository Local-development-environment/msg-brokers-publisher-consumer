<?php

namespace App\Http\Site\Inserts\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Site\Inserts\Resources\VInsertCollection;
use App\Http\Site\Inserts\Resources\VInsertResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\Inserts\InsertViews\Services\VInsertService;

class VInsertController extends Controller
{
    public function __construct(public VInsertService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new VInsertCollection($items))->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        data_set($data, 'id', $id);
        $model = $this->service->show($data, $id);

        return (new VInsertResource($model))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
