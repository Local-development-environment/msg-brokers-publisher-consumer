<?php

namespace App\Http\Admin\SharedProperty\LengthNames\Controllers;

use App\Http\Admin\SharedProperty\LengthNames\Resources\LengthNameCollection;
use App\Http\Admin\SharedProperty\LengthNames\Resources\LengthNameResource;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\LengthNames\Services\LengthNameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LengthNameController extends Controller
{
    public function __construct(public LengthNameService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new LengthNameCollection($items))->response();
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

        return (new LengthNameResource($model))->response();
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
