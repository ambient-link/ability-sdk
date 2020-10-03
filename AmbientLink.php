<?php

declare(strict_types=1);

namespace AmbientLink\SDK;

final class AmbientLink
{
    public const VERSION = '0.0.1-alpha';

    /** @var string */
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function token(): string
    {
        return $this->token;
    }
}
