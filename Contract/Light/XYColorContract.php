<?php

declare(strict_types=1);

namespace App\Infrastructure\AmbientLink\SDK\Contracts\Light;

final class XYColorContract
{
    /** @var float  */
    private $x;

    /** @var float */
    private $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function x(): float
    {
        return $this->x;
    }

    public function y(): float
    {
        return $this->y;
    }
}
