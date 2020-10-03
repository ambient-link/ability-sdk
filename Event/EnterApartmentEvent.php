<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Event;

use AmbientLink\SDK\Mqtt\Topic;
use Symfony\Contracts\EventDispatcher\Event;

final class EnterApartmentEvent extends Event
{
    public const NAME = 'enter.apartment';

    /** @var Topic */
    private $roomTopic;

    public function __construct(Topic $roomTopic)
    {
        $this->roomTopic = $roomTopic;
    }

    public function roomName(): string
    {
        return $this->roomTopic->toFriendlyName();
    }
}
