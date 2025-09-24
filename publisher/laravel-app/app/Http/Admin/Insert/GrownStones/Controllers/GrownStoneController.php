<?php

namespace App\Http\Admin\Insert\GrownStones\Controllers;

use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\GrownStones\Services\GrownStoneService;
use Domain\Users\Admins\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrownStoneController extends Controller
{
    public function __construct(public GrownStoneService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, GrownStone $grownStone): JsonResponse
    {
//        $this->authorize('viewAny', $grownStone);

        $data = $request->all();
        $items = $this->service->index($data);

        return (new GrownStoneCollection($items))->response();
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
