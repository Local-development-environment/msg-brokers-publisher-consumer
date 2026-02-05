<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Pipelines\Pipes;

use Illuminate\Support\Str;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\LengthNames\Repositories\LengthNameRepository;

final class LengthNameUpdatePipe
{
    public function __construct(public LengthNameRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        data_set($data, 'data.attributes.slug', Str::slug(data_get($data, 'data.attributes.name')), '-');

        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}
