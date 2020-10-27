<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Contracts\Music;

use Psr\Log\LoggerInterface;

final class MusicPlayer
{
    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function play(Song $song): void
    {
        $this->logger->info(sprintf('The Soundtrack "%s" of "%s" will be played.', $song->artist(), $song->title()));
    }
}
