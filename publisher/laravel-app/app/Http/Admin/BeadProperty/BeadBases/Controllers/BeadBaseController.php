<?php

namespace App\Http\Admin\BeadProperty\BeadBases\Controllers;

use App\Http\Admin\BeadProperty\BeadBases\Resources\BeadBaseCollection;
use App\Http\Admin\BeadProperty\BeadBases\Resources\BeadBaseResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadBases\Services\BeadBaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BeadBaseController extends Controller
{
    public function __construct(public BeadBaseService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BeadBaseCollection($items))->response();
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
    public function show(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        data_set($data, 'id', $id);
        $model = $this->service->show($data, $id);

        return (new BeadBaseResource($model))->response();
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
