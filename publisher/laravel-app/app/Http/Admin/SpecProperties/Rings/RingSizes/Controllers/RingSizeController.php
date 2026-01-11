<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingSizes\Controllers;

use App\Http\Admin\SpecProperties\Rings\RingSizes\Requests\RingSizeStoreRequest;
use App\Http\Admin\SpecProperties\Rings\RingSizes\Requests\RingSizeUpdateRequest;
use App\Http\Admin\SpecProperties\Rings\RingSizes\Resources\RingSizeCollection;
use App\Http\Admin\SpecProperties\Rings\RingSizes\Resources\RingSizeResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Rings\RingSizes\Enums\RingSizeNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Services\RingSizeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class RingSizeController extends Controller
{
    public function __construct(public RingSizeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new RingSizeCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(RingSizeStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new RingSizeResource($model))
            ->response()
            ->header('Location', route(RingSizeNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new RingSizeResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(RingSizeUpdateRequest $request, int $id): JsonResponse
    {
        $data = $request->all();

        $this->service->update($data, $id);

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(int $id): JsonResponse
    {
        $this->service->destroy($id);

        return response()->json(null, 204);
    }
}
