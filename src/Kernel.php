<?php

namespace CatalinMoiceanu\GithubActionsDemo;

use CatalinMoiceanu\GithubActionsDemo\Renderer\JsonResponseRenderer;
use CatalinMoiceanu\GithubActionsDemo\Service\Router;
use CatalinMoiceanu\GithubActionsDemo\Model\Request;
use JsonException;

class Kernel
{
    public function __construct(
        private Router $router,
        private JsonResponseRenderer $renderer
    ) {
    }

    /**
     * @throws JsonException
     */
    public function handleRequest(Request $request): void
    {
        $response = $this->router->route($request);
        $this->renderer->render($response);
    }
}
