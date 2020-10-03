<?php

declare(strict_types=1);

namespace App\Infrastructure\AmbientLink\SDK\Contracts\Music;

final class Artist
{
    /** @var string */
    private $name;

    /** @var Song[] */
    private $songs;

    public function __construct(string $name, array $songs)
    {
        $this->name = $name;
        $this->songs = $songs;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function songs(): array
    {
        return $this->songs;
    }
}
