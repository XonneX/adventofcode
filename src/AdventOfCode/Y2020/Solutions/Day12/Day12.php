<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day12;

use XonneX\AdventOfCode\Core\AbstractSolution;

class Day12 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2020, 12);
    }

    protected function partOne(string $input): string
    {
        $x         = 0;
        $y         = 0;
        $direction = 'E';

        $instructions = explode("\n", $input);

        foreach ($instructions as $instruction) {
            $op  = $instruction[0];
            $val = (int) substr($instruction, 1);

            if ($op === 'N') {
                $y += $val;
            } elseif ($op === 'S') {
                $y -= $val;
            } elseif ($op === 'E') {
                $x += $val;
            } elseif ($op === 'W') {
                $x -= $val;
            } elseif ($op === 'L' || $op === 'R') {
                $direction = $this->calculateDirection($direction, $op, $val);
            } elseif ($op === 'F') {
                if ($direction === 'E') {
                    $x += $val;
                } elseif ($direction === 'S') {
                    $y -= $val;
                } elseif ($direction === 'W') {
                    $x -= $val;
                } elseif ($direction === 'N') {
                    $y += $val;
                }
            }
        }

        return (string) (abs($x) + abs($y));
    }

    private function calculateDirection(string $direction, string $rotation, int $degrees): string
    {
        $translation = [
            'E' => 0,
            'S' => 90,
            'W' => 180,
            'N' => 270,
        ];

        $deg = $translation[$direction];

        if ($rotation === 'L') {
            $deg -= $degrees;
        } elseif ($rotation === 'R') {
            $deg += $degrees;
        }

        if ($deg < 0) {
            $deg = 360 + $deg;
        }

        return array_search($deg % 360, $translation);
    }

    protected function partTwo(string $input): string
    {
        $shipX = 0;
        $shipY = 0;

        $x         = 10;
        $y         = 1;

        $instructions = explode("\n", $input);

        foreach ($instructions as $instruction) {
            $op  = $instruction[0];
            $val = (int) substr($instruction, 1);

            if ($op === 'N') {
                $y += $val;
            } elseif ($op === 'S') {
                $y -= $val;
            } elseif ($op === 'E') {
                $x += $val;
            } elseif ($op === 'W') {
                $x -= $val;
            } elseif ($op === 'L') {
                for ($i = 0; $i < $val / 90; $i++) {
                    $tmpX = $x;
                    $tmpY = $y;

                    $x = $tmpY * -1;
                    $y = $tmpX;
                }
            } elseif ($op === 'R') {
                for ($i = 0; $i < $val / 90; $i++) {
                    $tmpX = $x;
                    $tmpY = $y;

                    $x = $tmpY;
                    $y = $tmpX * -1;
                }
            } elseif ($op === 'F') {
                $shipX += $val * $x;
                $shipY += $val * $y;
            }
        }

        return (string) (abs($shipX) + abs($shipY));
    }
}
