<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification\Concerns;

trait Meta
{
    /**
     * @internal
     *
     * @var array<string, mixed>
     */
    private array $meta = [];

    /**
     * @api
     *
     * @param  array<string, mixed>  $meta
     * @return $this
     */
    public function withMeta(array $meta): static
    {
        $this->meta = array_merge($this->meta, $meta);

        return $this;
    }
}
