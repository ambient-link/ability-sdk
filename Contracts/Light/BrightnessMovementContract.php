<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Contracts\Light;

/**
 * Instead of setting a brightness by value, you can also move it and stop it after a certain time
 * "brightness_move" will stop at brightnes 1 and won't turn on bulb when they are off.
 * In case you want this you can use "brightness_move_onoff" instead of "brightness_move".
 * Starts moving the brightness down at 40 units per second.
 */
final class BrightnessMovementContract
{
    /**
     * It is also possible to increase/decrease the brightness with a certain value.
     * "brightness_step" will stop at 1 and therefore not turn off the bulb, for this use "brightness_step_onoff" instead.
     * Increases the brightness by 40, to decrease use e.g. '-40'.
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
