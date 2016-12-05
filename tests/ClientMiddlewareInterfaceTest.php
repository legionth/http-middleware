<?php

use Psr\Http\Middleware\ClientMiddlewareInterface;
use Psr\Http\Middleware\DelegateInterface;
use Psr\Http\Message\RequestInterface;
use Legionth\Tests\Http\Middleware\SimpleResponse;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class ClientMiddleWareInterfaceTest extends TestCase
{
    private $middleWare;

    public function setUp()
    {
        $this->middleWare = new TestMiddleware();
    }

    public function testCalledMiddleware()
    {
        $response = new Response();
        $next = new SimpleResponse($response);

        $returned = $this->middleWare->process(new Request('GET', ''), $next);

        $this->assertEquals($response, $returned);
    }
}

class TestMiddleware implements ClientMiddlewareInterface
{
    public function process(RequestInterface $request, DelegateInterface $next)
    {
        return $next->next($request);
    }
}
