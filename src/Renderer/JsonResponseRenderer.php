<?php

namespace CatalinMoiceanu\GithubActionsDemo\Renderer;

use CatalinMoiceanu\GithubActionsDemo\Model\Response;
use JsonException;

class JsonResponseRenderer
{
    /**
     * @throws JsonException
     */
    public function render(Response $response): void
    {
        http_response_code($response->getStatusCode());
        foreach ($response->getHeaders() as $name => $value) {
            header($name . ': ' . $value);
        }
        echo json_encode($response->getPayload(), JSON_THROW_ON_ERROR);
    }
}
