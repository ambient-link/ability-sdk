<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Contracts\Light;

final class ColorContract
{
    /** @var RgbColorContract|null */
    private $rgbColorContract;

    /** @var XYColorContract|null */
    private $xyColorContract;

    /** @var HSBColorContract|null */
    private $hsbColorContract;

    public function __construct(
        RgbColorContract $rgbColorContract = null,
        XYColorContract $xyColorContract = null,
        HSBColorContract $hsbColorContract = null
    ) {
        $this->rgbColorContract = $rgbColorContract;
        $this->xyColorContract = $xyColorContract;
        $this->hsbColorContract = $hsbColorContract;
    }

    public function rgbColorContract(): ?RgbColorContract
    {
        return $this->rgbColorContract;
    }

    public function xyColorContract(): ?XYColorContract
    {
        return $this->xyColorContract;
    }

    public function hsbColorContract(): ?HSBColorContract
    {
        return $this->hsbColorContract;
    }

    public static function withRGB(RgbColorContract $rgbColorContract): self
    {
        return new self($rgbColorContract);
    }
}
