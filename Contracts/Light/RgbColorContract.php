<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Contracts\Light;

use Webmozart\Assert\Assert;

final class RgbColorContract
{
    /** @var int */
    private $red;

    /** @var int */
    private $green;

    /** @var int */
    private $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    public function red(): int
    {
        return $this->red;
    }

    public function green(): int
    {
        return $this->green;
    }

    public function blue(): int
    {
        return $this->blue;
    }

    public static function fromArray(array $data): self
    {
        Assert::keyExists($data, 'red');
        Assert::keyExists($data, 'green');
        Assert::keyExists($data, 'blue');

        return new self($data['red'], $data['green'], $data['blue']);
    }
}
