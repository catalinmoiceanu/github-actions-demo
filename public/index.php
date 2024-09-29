<?php

use CatalinMoiceanu\GithubActionsDemo\Kernel;
use CatalinMoiceanu\GithubActionsDemo\Model\Request;
use CatalinMoiceanu\GithubActionsDemo\Renderer\JsonResponseRenderer;
use CatalinMoiceanu\GithubActionsDemo\Service\ControllerResolver;
use CatalinMoiceanu\GithubActionsDemo\Service\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$resolver = new ControllerResolver();
$kernel = new Kernel(
    new Router($resolver),
    new JsonResponseRenderer()
);
try {
    $kernel->handleRequest(Request::fromEnv());
} catch (\Exception $e) {
    echo $e->getMessage();
}
