<?php

namespace App\Http\Admin\SharedProperty\LengthNames\Controllers;

use App\Http\Admin\SharedProperty\LengthNames\Requests\LengthNameStoreRequest;
use App\Http\Admin\SharedProperty\LengthNames\Requests\LengthNameUpdateRequest;
use App\Http\Admin\SharedProperty\LengthNames\Resources\LengthNameCollection;
use App\Http\Admin\SharedProperty\LengthNames\Resources\LengthNameResource;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameNameRoutesEnum;
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
     * @throws \Throwable
     */
    public function store(LengthNameStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new LengthNameResource($model))
            ->response()
            ->header('Location', route(LengthNameNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new LengthNameResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws \Throwable
     */
    public function update(LengthNameUpdateRequest $request, string $id): JsonResponse
    {
        $data = $request->all();

        $this->service->update($data, $id);

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Throwable
     */
    public function destroy(string $id): JsonResponse
    {
        $this->service->destroy($id);

        return response()->json(null, 204);
    }
}
