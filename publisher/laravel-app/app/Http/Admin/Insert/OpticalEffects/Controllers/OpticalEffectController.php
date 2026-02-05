<?php

namespace App\Http\Admin\Insert\OpticalEffects\Controllers;

use App\Http\Admin\Insert\OpticalEffects\Resources\OpticalEffectCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Services\OpticalEffectService;

class OpticalEffectController extends Controller
{
    public function __construct(public OpticalEffectService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new OpticalEffectCollection($items))->response();
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
