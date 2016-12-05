<?php

use Psr\Http\Middleware\DelegateInterface;
use Psr\Http\Middleware\ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Legionth\Tests\Http\Middleware\SimpleResponse;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;

class ServerMiddleWareInterfaceTest extends TestCase
{
    private $middleWare;

    public function setUp()
    {
        $this->middleWare = new TestServerMiddleware();
    }

    public function testCalledMiddleware()
    {
        $response = new Response();
        $next = new SimpleResponse($response);

        $returned = $this->middleWare->process(new ServerRequest('GET', ''), $next);

        $this->assertEquals($response, $returned);
    }
}

class TestServerMiddleware implements ServerMiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $next)
    {
        return $next->next($request);
    }
}
