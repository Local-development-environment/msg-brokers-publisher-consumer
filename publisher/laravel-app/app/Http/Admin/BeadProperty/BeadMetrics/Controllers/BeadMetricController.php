<?php

namespace App\Http\Admin\BeadProperty\BeadMetrics\Controllers;

use App\Http\Admin\BeadProperty\BeadMetrics\Resources\BeadMetricCollection;
use App\Http\Admin\BeadProperty\BeadMetrics\Resources\BeadMetricResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadMetrics\Services\BeadMetricService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BeadMetricController extends Controller
{
    public function __construct(public BeadMetricService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BeadMetricCollection($items))->response();
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

        return (new BeadMetricResource($model))->response();
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
