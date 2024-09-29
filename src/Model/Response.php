<?php

namespace CatalinMoiceanu\GithubActionsDemo\Model;

class Response
{
    /**
     * @param null[]|string[] $payload
     * @param null[]|string[] $headers
     */
    public function __construct(
        private readonly int $statusCode,
        private readonly array $payload = [],
        private readonly array $headers = []
    ) {
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return null[]|string[]
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @return null[]|string[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
