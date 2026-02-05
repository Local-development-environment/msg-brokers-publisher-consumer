<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Pipelines\Pipes;

use Illuminate\Support\Str;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Repositories\BeadBaseRepository;

final class BeadBaseUpdatePipe
{
    public function __construct(public BeadBaseRepository $repository)
    {
    }

    public function handle(array $data, \Closure $next): mixed
    {
        data_set($data, 'data.attributes.slug', Str::slug(data_get($data, 'data.attributes.name')), '-');

        $this->repository->update(data_get($data, 'data.attributes'), data_get($data, 'id'));

        return $next($data);
    }
}
