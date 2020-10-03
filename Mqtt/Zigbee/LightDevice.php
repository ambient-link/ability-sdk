<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Mqtt\Zigbee;

final class LightDevice
{
    /** @var string */
    private $topic;

    /** @var bool */
    private $brightness;

    /** @var bool */
    private $colorTemp;

    /** @var bool */
    private $xy;

    /** @var string */
    private $schema;

    /** @var string */
    private $commandTopic;

    /** @var int */
    private $brightnessScale;

    /** @var string */
    private $stateTopic;

    /** @var string */
    private $jsonAttributesTopic;

    /** @var string */
    private $name;

    /** @var string */
    private $uniqueId;

    /** @var Device */
    private $device;

    /** @var string */
    private $availabilityTopic;

    public function __construct(
        string $topic,
        bool $brightness,
        bool $colorTemp,
        bool $xy,
        string $schema,
        string $commandTopic,
        int $brightnessScale,
        string $stateTopic,
        string $jsonAttributesTopic,
        string $name,
        string $uniqueId,
        Device $device,
        string $availabilityTopic
    ) {
        $this->topic = $topic;
        $this->brightness = $brightness;
        $this->colorTemp = $colorTemp;
        $this->xy = $xy;
        $this->schema = $schema;
        $this->commandTopic = $commandTopic;
        $this->brightnessScale = $brightnessScale;
        $this->stateTopic = $stateTopic;
        $this->jsonAttributesTopic = $jsonAttributesTopic;
        $this->name = $name;
        $this->uniqueId = $uniqueId;
        $this->device = $device;
        $this->availabilityTopic = $availabilityTopic;
    }

    public function topic(): string
    {
        return $this->topic;
    }

    public function isBrightness(): bool
    {
        return $this->brightness;
    }

    public function isColorTemp(): bool
    {
        return $this->colorTemp;
    }

    public function isXy(): bool
    {
        return $this->xy;
    }

    public function schema(): string
    {
        return $this->schema;
    }

    public function commandTopic(): string
    {
        return $this->commandTopic;
    }

    public function brightnessScale(): int
    {
        return $this->brightnessScale;
    }

    public function stateTopic(): string
    {
        return $this->stateTopic;
    }

    public function jsonAttributesTopic(): string
    {
        return $this->jsonAttributesTopic;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function uniqueId(): string
    {
        return $this->uniqueId;
    }

    public function device(): Device
    {
        return $this->device;
    }

    public function availabilityTopic(): string
    {
        return $this->availabilityTopic;
    }
}
