<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Event;

use Symfony\Contracts\EventDispatcher\Event;

final class TellEvent extends Event
{
    public const NAME = 'tell.event';

    /** @var string */
    private $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function message(): string
    {
        return $this->message;
    }
}
