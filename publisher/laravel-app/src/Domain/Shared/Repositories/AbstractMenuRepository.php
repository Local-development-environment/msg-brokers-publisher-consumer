<?php

declare(strict_types=1);

namespace Domain\Shared\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

abstract class AbstractMenuRepository
{
    protected function getRequestWithoutFilterItem(array $params, string $key): Request
    {
        $request = app()['request'];
        $newRequest = Request::createFrom($request);

        $filters = data_get($params, 'filter');

        if ($filters && is_array($filters)) {
            if (array_key_exists($key, $filters) !== null) {
                Arr::forget($params, 'filter.' . $key);
            }
        }else {
            return $newRequest;
        }

        return $newRequest->merge($params);
    }
}