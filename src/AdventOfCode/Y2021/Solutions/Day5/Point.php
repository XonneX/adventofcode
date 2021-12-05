<?php

namespace XonneX\AdventOfCode\Y2021\Solutions\Day5;

use Stringable;

use function sprintf;

use const PHP_EOL;

class Point implements Stringable
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function __toString(): string
    {
        return sprintf('Point: %s,%s%s', $this->getX(), $this->getY(), PHP_EOL);
    }
}
