<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\OpticalEffectStones\Controllers;

use App\Http\Admin\Insert\OpticalEffectStones\Resources\StoneOpticalEffectCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneOpticalEffects\Services\StoneOpticalEffectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class StoneOpticalEffectController extends Controller
{
    public function __construct(public StoneOpticalEffectService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new StoneOpticalEffectCollection($items))->response();
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
