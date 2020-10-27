<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Contracts\Music;

final class Song
{
    /** @var Artist */
    private $artist;

    /** @var string */
    private $title;

    public function __construct(Artist $artist, string $title)
    {
        $this->artist = $artist;
        $this->title = $title;
    }

    public function artist(): Artist
    {
        return $this->artist;
    }

    public function title(): string
    {
        return $this->title;
    }
}
