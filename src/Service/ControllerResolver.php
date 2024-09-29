<?php

namespace CatalinMoiceanu\GithubActionsDemo\Service;

use CatalinMoiceanu\GithubActionsDemo\Controller\HealthCheckController;
use CatalinMoiceanu\GithubActionsDemo\Controller\IndexController;
use CatalinMoiceanu\GithubActionsDemo\Controller\NotFoundController;
use CatalinMoiceanu\GithubActionsDemo\Controller\ControllerInterface;
use CatalinMoiceanu\GithubActionsDemo\Model\Request;

class ControllerResolver
{
    public const string NOT_FOUND_ENDPOINT = 'not-found';

    public function resolve(Request $request): ControllerInterface
    {
        $endpoint = $request->getEndpoint();

        return match($endpoint) {
            'index' => new IndexController($request),
            'health-check' => new HealthCheckController($request),
            default => new NotFoundController($request)
        };
    }
}
