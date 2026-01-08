<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\GrownStones\Controllers;

use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneCollection;
use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\GrownStones\Services\GrownStoneService;
use Domain\Users\Admins\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class GrownStoneController extends Controller
{
    public function __construct(public GrownStoneService $service, public GrownStone $grownStone)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', $this->grownStone);

        $data = $request->all();
        $items = $this->service->index($data);

        return (new GrownStoneCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', $this->grownStone);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id): JsonResponse
    {
        $data = $request->all();

        data_set($data, 'id', $id);
        $model = $this->service->show($data, $id);

        return (new GrownStoneResource($model))->response();
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
