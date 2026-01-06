<?php
declare(strict_types=1);

namespace App\Http\Admin\Jewellery\Categories\Controllers;

use App\Http\Admin\Jewellery\Categories\Resources\JewelleryCategoryCollection;
use App\Http\Admin\Jewellery\Categories\Resources\JewelleryCategoryResource;
use App\Http\Controllers\Controller;
use Domain\Jewelleries\JewelleryCategories\Services\JewelleryCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class JewelleryCategoryController extends Controller
{
    public function __construct(public JewelleryCategoryService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new JewelleryCategoryCollection($items))->response();
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
    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        data_set($data, 'id', $id);
        $model = $this->service->show($data, $id);

        return (new JewelleryCategoryResource($model))->response();
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
