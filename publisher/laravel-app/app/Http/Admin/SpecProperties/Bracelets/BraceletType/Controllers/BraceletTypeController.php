<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletType\Controllers;

use App\Http\Admin\SpecProperties\Bracelets\BraceletType\Resources\BraceletTypeCollection;
use App\Http\Admin\SpecProperties\Bracelets\BraceletType\Resources\BraceletTypeResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Bracelets\BraceletTypes\Services\BraceletTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class BraceletTypeController extends Controller
{
    public function __construct(public BraceletTypeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new BraceletTypeCollection($items))->response();
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

        return (new BraceletTypeResource($model))->response();
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
