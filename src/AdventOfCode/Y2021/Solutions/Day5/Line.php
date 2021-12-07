<?php

namespace XonneX\AdventOfCode\Y2021\Solutions\Day5;

use Stringable;

use function array_shift;
use function range;
use function sprintf;

use const PHP_EOL;

class Line implements Stringable
{
    private Point $start;
    private Point $end;

    /**
     * @var Point[]|null
     */
    private ?array $points = null;

    public function __construct(Point $start, Point $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getStart(): Point
    {
        return $this->start;
    }

    public function getEnd(): Point
    {
        return $this->end;
    }

    /**
     * @return Point[]
     */
    public function getPoints(bool $includeDiagonal = false): array
    {
        if ($this->points === null) {
            $points = [];

            $x1 = $this->start->getX();
            $y1 = $this->start->getY();
            $x2 = $this->end->getX();
            $y2 = $this->end->getY();

            if ($x1 === $x2) {
                $range = range($y1, $y2);

                foreach ($range as $y) {
                    $points[] = new Point($x1, $y);
                }
            } elseif ($y1 === $y2) {
                $range = range($x1, $x2);

                foreach ($range as $x) {
                    $points[] = new Point($x, $y1);
                }
            } elseif ($includeDiagonal) {
                $xRange = range($x1, $x2);
                $yRange = range($y1, $y2);

                while (($x = array_shift($xRange)) !== null) {
                    $y = array_shift($yRange);

                    $points[] = new Point($x, $y);
                }
            }

            $this->points = $points;
        }

        return $this->points;
    }

    public function __toString(): string
    {
        return sprintf(
            'Line: %s,%s -> %s,%s%s',
            $this->getStart()->getX(),
            $this->getStart()->getY(),
            $this->getEnd()->getX(),
            $this->getEnd()->getY(),
            PHP_EOL
        );
    }
}
