<?php

namespace App\Http\Admin\Insert\ImitationStones\Controllers;

use App\Http\Admin\Insert\ImitationStones\Resources\ImitationStoneCollection;
use App\Http\Admin\Insert\ImitationStones\Resources\ImitationStoneResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Enums\ImitationStoneNameRoutesEnum;
use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Services\ImitationStoneService;
use Throwable;

class ImitationStoneController extends Controller
{
    public function __construct(public ImitationStoneService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new ImitationStoneCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new ImitationStoneResource($model))
            ->response()
            ->header('Location', route(ImitationStoneNameRoutesEnum::CRUD_SHOW->value, [
                'id' => $model->id
            ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        data_set($data, 'id', $id);
        $model = $this->service->show($data, $id);

        return (new ImitationStoneResource($model))->response();
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
