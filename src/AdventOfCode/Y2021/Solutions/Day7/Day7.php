<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day7;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_sum;
use function explode;
use function range;
use function var_dump;

class Day7 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 7);
    }

    protected function partOne(string $input): string
    {
        $positions = explode(",", $input);

        sort($positions);
        $count = count($positions);
        $index = floor($count / 2);

        if ($count & 1) {
            $medianPosition = $positions[$index];
        } else {
            $medianPosition = ($positions[$index - 1] + $positions[$index]) / 2;
        }

        $fuel = 0;
        foreach ($positions as $position) {
            if ($position > $medianPosition) {
                $fuel += $position - $medianPosition;
            } else {
                $fuel += $medianPosition - $position;
            }
        }

        return (string) $fuel;
    }

    protected function partTwo(string $input): string
    {
        $positions = explode(",", $input);

        $sum = array_sum($positions);
        $count = count($positions);

        $averageLow = floor($sum / $count);
        $averageHigh = ceil($sum / $count);

        $fuelLow = 0;
        foreach ($positions as $position) {
            if ($position > $averageLow) {
                $fuelLow += array_sum(range(1, $position - $averageLow));
            } else {
                $fuelLow += array_sum(range(1, $averageLow - $position));
            }
        }

        $fuelHigh = 0;
        foreach ($positions as $position) {
            if ($position > $averageHigh) {
                $fuelHigh += array_sum(range(1, $position - $averageHigh));
            } else {
                $fuelHigh += array_sum(range(1, $averageHigh - $position));
            }
        }

        if ($fuelHigh > $fuelLow) {
            return (string) $fuelLow;
        }

        return (string) $fuelHigh;
    }
}
