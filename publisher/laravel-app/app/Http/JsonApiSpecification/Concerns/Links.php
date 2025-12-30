<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification\Concerns;

use App\Http\JsonApiSpecification\Link;
use Illuminate\Support\Collection;

trait Links
{
    /**
     * @internal
     *
     * @var array<int, Link>
     */
    private array $links = [];

    /**
     * @api
     *
     * @param  array<int, Link>  $links
     * @return $this
     */
    public function withLinks(array $links): static
    {
        $this->links = array_merge(
            $this->links,
            Collection::make($links)
                ->map(fn ($value, $key) => is_string($key) ? new Link($key, $value) : $value)
                ->values()
                ->all()
        );

        return $this;
    }

    /**
     * @internal
     *
     * @param  array<int, Link>  $links
     * @return array<string, Link>
     */
    private static function parseLinks(array $links): array
    {
        return Collection::make($links)
            ->mapWithKeys(fn (Link $link): array => [
                $link->key => $link,
            ])
            ->all();
    }
}
