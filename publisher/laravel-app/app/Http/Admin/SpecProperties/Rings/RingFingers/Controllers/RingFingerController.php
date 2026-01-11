<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Rings\RingFingers\Controllers;

use App\Http\Admin\SpecProperties\Rings\RingFingers\Requests\RingFingerStoreRequest;
use App\Http\Admin\SpecProperties\Rings\RingFingers\Requests\RingFingerUpdateRequest;
use App\Http\Admin\SpecProperties\Rings\RingFingers\Resources\RingFingerCollection;
use App\Http\Admin\SpecProperties\Rings\RingFingers\Resources\RingFingerResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerNameRoutesEnum;
use Domain\JewelleryProperties\Rings\RingFingers\Services\RingFingerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class RingFingerController extends Controller
{
    public function __construct(public RingFingerService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new RingFingerCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(RingFingerStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new RingFingerResource($model))
            ->response()
            ->header('Location', route(RingFingerNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new RingFingerResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(RingFingerUpdateRequest $request, int $id): JsonResponse
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
