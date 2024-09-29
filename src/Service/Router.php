<?php

namespace CatalinMoiceanu\GithubActionsDemo\Service;

use CatalinMoiceanu\GithubActionsDemo\Model\Request;
use CatalinMoiceanu\GithubActionsDemo\Model\Response;

class Router
{
    public function __construct(private readonly ControllerResolver $resolver)
    {

    }

    public function route(Request $request): Response
    {
        return $this->resolver->resolve($request)->execute();
    }
}
