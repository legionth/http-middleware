<?php

namespace Legionth\Tests\Http\Middleware;

use Psr\Http\Middleware\DelegateInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class SimpleResponse implements DelegateInterface
{
    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function next(RequestInterface $request)
    {
        return $this->response;
    }
}
