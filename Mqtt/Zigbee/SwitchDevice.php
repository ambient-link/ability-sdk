<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Mqtt\Zigbee;

final class SwitchDevice
{
    /** @var float */
    private $battery;

    /** @var int */
    private $linkQuality;

    /** @var bool */
    private $updateAvailable;

    /** @var int */
    private $counter;

    /** @var int */
    private $brightness;

    /** @var string */
    private $action;

    /** @var int */
    private $duration;

    public function __construct(
        float $battery,
        int $linkQuality,
        bool $updateAvailable,
        int $counter,
        int $brightness,
        string $action,
        int $duration
    ) {
        $this->battery = $battery;
        $this->linkQuality = $linkQuality;
        $this->updateAvailable = $updateAvailable;
        $this->counter = $counter;
        $this->brightness = $brightness;
        $this->action = $action;
        $this->duration = $duration;
    }

    public function battery(): float
    {
        return $this->battery;
    }

    public function linkQuality(): int
    {
        return $this->linkQuality;
    }

    public function isUpdateAvailable(): bool
    {
        return $this->updateAvailable;
    }

    public function counter(): int
    {
        return $this->counter;
    }

    public function brightness(): int
    {
        return $this->brightness;
    }

    public function action(): string
    {
        return $this->action;
    }

    public function duration(): int
    {
        return $this->duration;
    }
}
