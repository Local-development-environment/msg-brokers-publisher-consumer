<?php

declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\TieClips\TieClip\Controllers;

use App\Http\Admin\SpecProperties\TieClips\TieClip\Requests\TieClipStoreRequest;
use App\Http\Admin\SpecProperties\TieClips\TieClip\Requests\TieClipUpdateRequest;
use App\Http\Admin\SpecProperties\TieClips\TieClip\Resources\TieClipCollection;
use App\Http\Admin\SpecProperties\TieClips\TieClip\Resources\TieClipResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Enums\TieClipEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Enums\TieClipNameRoutesEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\TieClips\TieClips\Services\TieClipService;
use Throwable;

final class TieClipController extends Controller
{
    public function __construct(public TieClipService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new TieClipCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(TieClipStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new TieClipResource($model))
            ->response()
            ->header('Location', route(TieClipNameRoutesEnum::CRUD_SHOW->value, [
                TieClipEnum::PRIMARY_KEY->value => $model->id
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

        return (new TieClipResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(TieClipUpdateRequest $request, int $id): JsonResponse
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
