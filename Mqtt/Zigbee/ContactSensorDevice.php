<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Mqtt\Zigbee;

final class ContactSensorDevice
{
    /** @var string */
    private $topic;

    /** @var int */
    private $battery;

    /** @var int */
    private $voltage;

    /** @var bool */
    private $contact;

    /** @var int */
    private $linkQuality;

    public function __construct(string $topic, int $battery, int $voltage, bool $contact, int $linkQuality)
    {
        $this->topic = $topic;
        $this->battery = $battery;
        $this->voltage = $voltage;
        $this->contact = $contact;
        $this->linkQuality = $linkQuality;
    }

    public function topic(): string
    {
        return $this->topic;
    }

    public function battery(): int
    {
        return $this->battery;
    }

    public function voltage(): int
    {
        return $this->voltage;
    }

    public function hasContact(): bool
    {
        return $this->contact;
    }

    public function linkQuality(): int
    {
        return $this->linkQuality;
    }
}
