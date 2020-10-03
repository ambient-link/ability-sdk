<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Mqtt\Zigbee;

use AmbientLink\SDK\Mqtt\Topic;

final class RoomSensorDevice
{
    /** @var Topic */
    private $topic;

    /** @var int */
    private $battery;

    /** @var bool */
    private $occupancy;

    /** @var float */
    private $temperature;

    /** @var int */
    private $illuminance;

    public function __construct(Topic $topic, int $battery, bool $occupancy, float $temperature, int $illuminance)
    {
        $this->topic = $topic;
        $this->battery = $battery;
        $this->occupancy = $occupancy;
        $this->temperature = $temperature;
        $this->illuminance = $illuminance;
    }

    public function topic(): Topic
    {
        return $this->topic;
    }

    public function battery(): int
    {
        return $this->battery;
    }

    public function hasOccupancy(): bool
    {
        return $this->occupancy;
    }

    public function temperature(): float
    {
        return $this->temperature;
    }

    public function illuminance(): int
    {
        return $this->illuminance;
    }
}
