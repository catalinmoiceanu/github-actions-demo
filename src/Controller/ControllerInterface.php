<?php

namespace CatalinMoiceanu\GithubActionsDemo\Controller;

use CatalinMoiceanu\GithubActionsDemo\Model\Response;

interface ControllerInterface
{
    public function execute(): Response;
}
