<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\MissingValue;
use Illuminate\Support\Collection;

final class BraceletCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'data' => $this->collection,
            'included' => $this->mergeIncludedRelations($request),
        ];
    }

    private function mergeIncludedRelations($request): MissingValue|Collection|Model
    {
        $includes = $this->collection->flatMap(function ($resource) use(
            $request){
            return $resource->included($request);
        })->unique()->values();

        return $includes->isNotEmpty() ? $includes : new MissingValue();
    }

}
