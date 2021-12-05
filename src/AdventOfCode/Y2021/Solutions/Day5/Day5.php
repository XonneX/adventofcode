<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day5;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_key_exists;
use function array_shift;
use function explode;

use function microtime;

use function rsort;

use const PHP_EOL;

class Day5 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 5);
    } 

    protected function partOne(string $input): string
    {
        $instructions = explode("\n", $input);

        $lines = [];

        foreach ($instructions as $line) {
            $coordinates = explode(' -> ', $line);
            [$x1, $y1] = explode(',', $coordinates[0]);
            [$x2, $y2] = explode(',', $coordinates[1]);
            $start = new Point((int) $x1, (int) $y1);
            $end = new Point((int) $x2, (int) $y2);
            $lines[] = new Line($start, $end);
        }

        $coordinatesCounter = [];
        foreach ($lines as $line) {
            foreach ($line->getPoints() as $point) {
                $key = $point->getX() . '-' . $point->getY();

                if (array_key_exists($key, $coordinatesCounter)) {
                    $coordinatesCounter[$key]++;
                } else {
                    $coordinatesCounter[$key] = 1;
                }
            }
        }

        rsort($coordinatesCounter);

        $counter = 0;
        while (array_shift($coordinatesCounter) > 1) {
            $counter++;
        }

        return (string) $counter;
    }

    protected function partTwo(string $input): string
    {
        $instructions = explode("\n", $input);

        $lines = [];

        foreach ($instructions as $line) {
            $coordinates = explode(' -> ', $line);
            [$x1, $y1] = explode(',', $coordinates[0]);
            [$x2, $y2] = explode(',', $coordinates[1]);
            $start = new Point((int) $x1, (int) $y1);
            $end = new Point((int) $x2, (int) $y2);
            $lines[] = new Line($start, $end);
        }

        $coordinatesCounter = [];
        foreach ($lines as $line) {
            foreach ($line->getPoints(true) as $point) {
                $key = $point->getX() . '-' . $point->getY();

                if (array_key_exists($key, $coordinatesCounter)) {
                    $coordinatesCounter[$key]++;
                } else {
                    $coordinatesCounter[$key] = 1;
                }
            }
        }

        rsort($coordinatesCounter);

        $counter = 0;
        while (array_shift($coordinatesCounter) > 1) {
            $counter++;
        }

        return (string) $counter;
    }
}
