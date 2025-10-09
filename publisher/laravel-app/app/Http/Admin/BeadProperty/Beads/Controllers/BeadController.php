<?php

namespace App\Http\Admin\BeadProperty\Beads\Controllers;

use App\Http\Admin\BeadProperty\Beads\Resources\BeadCollection;
use App\Http\Admin\BeadProperty\Beads\Resources\BeadResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\Beads\Services\BeadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BeadController extends Controller
{
    public function __construct(public BeadService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BeadCollection($items))->response();
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

        return (new BeadResource($model))->response();
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
