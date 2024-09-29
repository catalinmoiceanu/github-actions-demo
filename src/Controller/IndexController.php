<?php

namespace CatalinMoiceanu\GithubActionsDemo\Controller;

use CatalinMoiceanu\GithubActionsDemo\Model\Response;

class IndexController implements ControllerInterface
{
    use ControllerTrait;

    public function execute(): Response
    {
        return $this->toJsonResponse([
            'action' => 'index'
        ]);
    }
}
