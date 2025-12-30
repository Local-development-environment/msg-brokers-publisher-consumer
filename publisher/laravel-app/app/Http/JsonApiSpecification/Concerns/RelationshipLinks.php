<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification\Concerns;

use App\Http\JsonApiSpecification\RelationshipObject;
use Illuminate\Http\Request;

trait RelationshipLinks
{
    /**
     * @internal
     *
     * @var array<int, (callable(RelationshipObject): void)>
     */
    private array $relationshipLinkCallbacks = [];

    /**
     * @api
     *
     * @param  (callable(RelationshipObject): void)  $callback
     * @return $this
     */
    public function withRelationshipLink(callable $callback): static
    {
        $this->relationshipLinkCallbacks[] = $callback;

        return $this;
    }

    /**
     * @param Request $request
     * @return RelationshipObject
     * @internal
     *
     */
    public function resolveRelationshipLink(Request $request): RelationshipObject
    {
        return tap($this->toResourceLink($request), function (RelationshipObject $link): void {
            foreach ($this->relationshipLinkCallbacks as $callback) {
                $callback($link);
            }
        });
    }
}
