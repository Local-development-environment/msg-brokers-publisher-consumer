<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Controllers;

use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Requests\CharmPendantStoreRequest;
use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Requests\CharmPendantUpdateRequest;
use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Resources\CharmPendantCollection;
use App\Http\Admin\SpecProperties\CharmPendants\CharmPendant\Resources\CharmPendantResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Enums\CharmPendantEnum;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Enums\CharmPendantNameRoutesEnum;
use Domain\JewelleryProperties\CharmPendants\CharmPendants\Services\CharmPendantService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class CharmPendantController extends Controller
{
    public function __construct(public CharmPendantService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new CharmPendantCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(CharmPendantStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new CharmPendantResource($model))
            ->response()
            ->header('Location', route(CharmPendantNameRoutesEnum::CRUD_SHOW->value, [
                CharmPendantEnum::PRIMARY_KEY->value => $model->id
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

        return (new CharmPendantResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(CharmPendantUpdateRequest $request, int $id): JsonResponse
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
