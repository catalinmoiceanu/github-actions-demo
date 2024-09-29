<?php

namespace CatalinMoiceanu\GithubActionsDemo\Controller;

use CatalinMoiceanu\GithubActionsDemo\Model\Request;
use CatalinMoiceanu\GithubActionsDemo\Model\Response;

trait ControllerTrait
{
    public function __construct(private readonly Request $request)
    {

    }

    /**
     * @param null[]|string[] $payload
     */
    protected function toJsonResponse(array $payload = [], int $statusCode = 200): Response
    {
        return new Response(
            $statusCode,
            $payload,
            [
                'Content-Type' => 'application/json'
            ]
        );
    }
}
