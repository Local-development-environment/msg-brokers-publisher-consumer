<?php

namespace App\Http\Integrations\UVI\Jewelleries\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllJewelleries extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $params = ''
    )
    {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
//        dd($this->params);
        return '/jewelleries' . $this->params;
    }
}
