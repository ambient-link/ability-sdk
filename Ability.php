<?php

declare(strict_types=1);

namespace AmbientLink\SDK;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

interface Ability extends EventSubscriberInterface
{
    public function getName(): string;
}
