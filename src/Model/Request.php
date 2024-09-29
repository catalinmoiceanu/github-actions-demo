<?php

namespace CatalinMoiceanu\GithubActionsDemo\Model;

class Request
{
    /**
     * @param null[]|string[] $payload
     * @param null[]|string[] $headers
     */
    public function __construct(
        private readonly string $endpoint,
        private readonly array $payload = [],
        private readonly array $headers = []
    ) {
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function getParameter(string $name, string $default = null): ?string
    {
        return $this->payload[$name] ?? $default;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     * @return null[]|string[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    public static function fromEnv(): Request
    {
        return new self(
            $_GET['action'] ?? 'index',
            $_GET['params'] ?? [],
            getallheaders()
        );
    }
}
