<?php

namespace App\Http\Admin\SharedProperty\Clasps\Controllers;

use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspCollection;
use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\Clasps\Services\ClaspService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClaspController extends Controller
{
    public function __construct(public ClaspService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new ClaspCollection($items))->response();
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

        return (new ClaspResource($model))->response();
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
