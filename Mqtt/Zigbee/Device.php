<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Mqtt\Zigbee;

final class Device
{
    /** @var string[] */
    private $identifiers;

    /** @var int */
    private $name;

    /** @var int */
    private $swVersion;

    /** @var int */
    private $model;

    /** @var int */
    private $manufacturer;

    public function __construct($identifiers, int $name, int $swVersion, int $model, int $manufacturer)
    {
        $this->identifiers = $identifiers;
        $this->name = $name;
        $this->swVersion = $swVersion;
        $this->model = $model;
        $this->manufacturer = $manufacturer;
    }

    public function identifiers(): array
    {
        return $this->identifiers;
    }

    public function name(): int
    {
        return $this->name;
    }

    public function swVersion(): int
    {
        return $this->swVersion;
    }

    public function model(): int
    {
        return $this->model;
    }

    public function manufacturer(): int
    {
        return $this->manufacturer;
    }
}
