<?php

namespace App\Http\Admin\BeadProperty\BeadSizes\Controllers;

use App\Http\Admin\BeadProperty\BeadSizes\Resources\BeadSizeCollection;
use App\Http\Admin\BeadProperty\BeadSizes\Resources\BeadSizeResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadSizes\Services\BeadSizeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BeadSizeController extends Controller
{
    public function __construct(public BeadSizeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BeadSizeCollection($items))->response();
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

        return (new BeadSizeResource($model))->response();
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
