<?php

namespace CatalinMoiceanu\GithubActionsDemo\Controller;

use CatalinMoiceanu\GithubActionsDemo\Model\Response;

class HealthCheckController implements ControllerInterface
{
    use ControllerTrait;

    public function execute(): Response
    {
        return $this->toJsonResponse([
            'action' => 'health-check',
            'ping' => $this->request->getParameter('ping')
        ]);
    }
}
