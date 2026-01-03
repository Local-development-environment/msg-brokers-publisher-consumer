<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Pendants\Pendants\Controllers;

use App\Http\Admin\SpecProperties\Pendants\Pendants\Requests\PendantStoreRequest;
use App\Http\Admin\SpecProperties\Pendants\Pendants\Requests\PendantUpdateRequest;
use Domain\JewelleryProperties\Pendants\Pendants\Enums\PendantEnum;
use Domain\JewelleryProperties\Pendants\Pendants\Enums\PendantNameRoutesEnum;
use Domain\JewelleryProperties\Pendants\Pendants\Services\PendantService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class PendantController extends \App\Http\Controllers\Controller
{
    public function __construct(public PendantService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new PendantCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(PendantStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new PendantResource($model))
            ->response()
            ->header('Location', route(PendantNameRoutesEnum::CRUD_SHOW->value, [
                PendantEnum::PRIMARY_KEY->value => $model->id
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

        return (new PendantResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(PendantUpdateRequest $request, int $id): JsonResponse
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
