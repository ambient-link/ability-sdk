<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Mqtt;

use AmbientLink\SDK\Mqtt\Zigbee\Device;
use AmbientLink\SDK\Mqtt\Zigbee\LightDevice;
use AmbientLink\SDK\Mqtt\Zigbee\RoomSensorDevice;
use AmbientLink\SDK\Mqtt\Zigbee\SwitchDevice;

final class Room
{
    /** @var string */
    private string $name;

    /** @var LightDevice[] */
    private $lights;

    /** @var Device[] */
    private $plugs;

    /** @var RoomSensorDevice[] */
    private $sensors;

    /** @var SwitchDevice[] */
    private $switches;

    public function __construct(
        string $name,
        array $lights = [],
        array $plugs = [],
        array $sensors = [],
        array $switches = []
    ) {
        $this->name = $name;
        $this->lights = $lights;
        $this->plugs = $plugs;
        $this->sensors = $sensors;
        $this->switches = $switches;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lights(): array
    {
        return $this->lights;
    }

    public function plugs(): array
    {
        return $this->plugs;
    }

    public function sensors(): array
    {
        return $this->sensors;
    }

    public function switches(): array
    {
        return $this->switches;
    }
}
