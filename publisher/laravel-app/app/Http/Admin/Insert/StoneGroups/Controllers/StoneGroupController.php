<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneGroups\Controllers;

use App\Http\Admin\Insert\StoneGroups\Resources\StoneGroupCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneGroups\Models\StoneGroup;
use Domain\Inserts\StoneGroups\Services\StoneGroupService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class StoneGroupController extends Controller
{
    public function __construct(private StoneGroupService $service, private StoneGroup $stoneGroup)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new StoneGroupCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', $this->stoneGroup);
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
        $this->authorize('update', $this->stoneGroup);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('update', $this->stoneGroup);
    }
}
