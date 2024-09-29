<?php

namespace CatalinMoiceanu\GithubActionsDemo\Controller;

use CatalinMoiceanu\GithubActionsDemo\Model\Response;

class NotFoundController implements ControllerInterface
{
    use ControllerTrait;

    public function execute(): Response
    {
        return $this->toJsonResponse([
            'action' => 'not-found',
        ], 404);
    }
}
