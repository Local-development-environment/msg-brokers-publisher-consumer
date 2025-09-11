<?php

namespace App\Http\Admin\Insert\StoneMetrics\Controllers;

use App\Http\Admin\Insert\StoneMetrics\Resources\StoneMetricCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneMetrics\Services\StoneMetricService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoneMetricController extends Controller
{
    public function __construct(public StoneMetricService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new StoneMetricCollection($items))->response();
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
