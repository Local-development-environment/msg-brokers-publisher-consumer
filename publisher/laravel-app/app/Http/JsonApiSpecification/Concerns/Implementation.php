<?php

declare(strict_types=1);

namespace App\Http\JsonApiSpecification\Concerns;

use App\Http\JsonApiSpecification\ServerImplementation;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

trait Implementation
{
    /**
     * @api
     *
     * @param  (callable(): ServerImplementation)  $callback
     * @return void
     */
    public static function resolveServerImplementationUsing(callable $callback): void
    {
        App::instance(self::class.':$serverImplementationResolver', $callback);
    }

    /**
     * @return (callable(Request): (ServerImplementation|null))
     * @throws BindingResolutionException
     * @internal
     *
     */
    public static function serverImplementationResolver(): callable
    {
        return App::bound(self::class.':$serverImplementationResolver')
            ? App::make(self::class.':$serverImplementationResolver')
            : fn () => null;
    }
}
