<?php

namespace CatalinMoiceanu\GithubActionsDemo\Tests;

use CatalinMoiceanu\GithubActionsDemo\Kernel;
use CatalinMoiceanu\GithubActionsDemo\Model\Request;
use CatalinMoiceanu\GithubActionsDemo\Model\Response;
use CatalinMoiceanu\GithubActionsDemo\Renderer\JsonResponseRenderer;
use CatalinMoiceanu\GithubActionsDemo\Service\Router;
use PHPUnit\Framework\TestCase;

class KernelTest extends TestCase
{
    public function testRunNoException(): void
    {
        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();
        $response = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->getMock();
        $router = $this->getMockBuilder(Router::class)
            ->disableOriginalConstructor()
            ->getMock();
        $jsonResponseRenderer = $this->getMockBuilder(JsonResponseRenderer::class)
            ->getMock();

        $router->expects($this->once())
            ->method('route')
            ->with($request)
            ->willReturn($response);
        $jsonResponseRenderer->expects($this->once())
            ->method('render')
            ->with($response)
            ->willReturnSelf();

        $kernel = new Kernel($router, $jsonResponseRenderer);
        $kernel->handleRequest($request);
    }
    public function testRunWithJsonException(): void
    {
        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();
        $response = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->getMock();
        $router = $this->getMockBuilder(Router::class)
            ->disableOriginalConstructor()
            ->getMock();
        $jsonResponseRenderer = $this->getMockBuilder(JsonResponseRenderer::class)
            ->getMock();

        $router->expects($this->once())
            ->method('route')
            ->willReturn($response);
        $jsonResponseRenderer->expects($this->once())
            ->method('render')
            ->willThrowException(new \Exception());

        $kernel = new Kernel($router, $jsonResponseRenderer);

        $this->expectException(\Exception::class);
        $kernel->handleRequest($request);
    }
}
