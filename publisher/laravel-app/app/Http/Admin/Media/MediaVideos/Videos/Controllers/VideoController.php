<?php
declare(strict_types=1);

namespace App\Http\Admin\Media\MediaVideos\Videos\Controllers;

use App\Http\Admin\Media\MediaVideos\Videos\Requests\VideoStoreRequest;
use App\Http\Admin\Media\MediaVideos\Videos\Resources\VideoCollection;
use App\Http\Admin\Media\MediaVideos\Videos\Resources\VideoResource;
use App\Http\Admin\Media\Shared\VideoTypes\Requests\VideoUpdateRequest;
use App\Http\Controllers\Controller;
use Domain\Medias\MediaVideos\Videos\Enums\VideoNameRoutesEnum;
use Domain\Medias\MediaVideos\Videos\Services\VideoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final class VideoController extends Controller
{
    public function __construct(public VideoService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new VideoCollection($items))->response();
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(VideoStoreRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->service->store($data);

        return (new VideoResource($model))
            ->response()
            ->header('Location', route(VideoNameRoutesEnum::CRUD_SHOW->value, [
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

        return (new VideoResource($model))->response();
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(VideoUpdateRequest $request, int $id): JsonResponse
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
