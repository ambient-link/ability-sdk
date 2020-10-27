<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Contracts\Light;

final class HSBColorContract
{
    /** @var int */
    private $hue;

    /** @var int */
    private $saturation;

    /** @var int */
    private $brightness;

    public function __construct(int $hue, int $saturation, int $brightness)
    {
        $this->hue = $hue;
        $this->saturation = $saturation;
        $this->brightness = $brightness;
    }

    public function hue(): int
    {
        return $this->hue;
    }

    public function saturation(): int
    {
        return $this->saturation;
    }

    public function brightness(): int
    {
        return $this->brightness;
    }
}
