<?php

namespace App\Http\Site\Jewelleries\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Site\Jewelleries\Resources\VJewelleryCollection;
use App\Http\Site\Jewelleries\Resources\VJewelleryResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\JewelleryViews\Services\VJewelleryService;

class VJewelleryController extends Controller
{
    public function __construct(public VJewelleryService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $params = $request->all();
        $items = $this->service->index($params);

        return (new VJewelleryCollection($items['data']))
            ->additional(
                ['menu' =>
                    [
                        $items['menu']
                    ]
                ]
            )
            ->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id): JsonResponse
    {
        $params = $request->all();
        data_set($params, 'id', $id);
        $model = $this->service->show($params, $id);

        return (new VJewelleryResource($model))->response();
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
