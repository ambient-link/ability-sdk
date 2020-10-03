<?php

declare(strict_types=1);

namespace App\Infrastructure\AmbientLink\SDK\Contracts\Light;

final class ColorTemperatureMovementContract
{
    /**
     * Similar to brightness_move, color_temp_move will move the color temperature.
     * Starts moving the color temperature up at 40 units per second
     * "stop" Stops the color temperature move.
     *
     * @var int
     */
    private $move;

    /** @var bool */
    private $stopped;

    public function __construct(int $move, bool $stopped)
    {
        $this->move = $move;
        $this->stopped = $stopped;
    }

    public static function createStopped(): self
    {
        return new self(0, true);
    }

    public function move(): int
    {
        return $this->move;
    }

    public function isStopped(): bool
    {
        return $this->stopped;
    }
}
