<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day11;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function explode;
use function str_split;

use const PHP_EOL;

class Day11 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 11);
    }

    protected function partOne(string $input): string
    {
        $grid = [];

        foreach (explode("\n", $input) as $x => $line) {
            foreach (str_split($line) as $y => $energyLevel) {
                $octopus = new Octopus();
                $octopus->energyLevel = (int) $energyLevel;
                $grid[$x][$y] = $octopus;
            }
        }

        $flashCounter = 0;

        for ($i = 0; $i < 100; $i++) {
            $flashCounter += $this->flash($grid);
        }

        return (string) $flashCounter;
    }

    protected function partTwo(string $input): string
    {
        $grid = [];

        foreach (explode("\n", $input) as $x => $line) {
            foreach (str_split($line) as $y => $energyLevel) {
                $octopus = new Octopus();
                $octopus->energyLevel = (int) $energyLevel;
                $grid[$x][$y] = $octopus;
            }
        }

        $i = 1;
        while ($this->flash($grid) !== 100) {
            $i++;
        }

        return (string) $i;
    }

    /**
     * @param Octopus[][] $grid
     */
    private function flash(array $grid): int
    {
        $flashCounter = 0;

        foreach ($grid as $row) {
            foreach ($row as $entry) {
                $entry->energyLevel++;
                $entry->hasFlashed = false;
            }
        }

        $found = true;

        while ($found) {
            $found = false;

            foreach ($grid as $x => $row) {
                foreach ($row as $y => $octopus) {
                    if (
                        $octopus->energyLevel > 9
                        && !$octopus->hasFlashed
                    ) {
                        $octopus->energyLevel = 0;
                        $octopus->hasFlashed = true;
                        $found = true;
                        $flashCounter++;

                        $others = [
                            $grid[$x - 1][$y] ?? null,
                            $grid[$x - 1][$y + 1] ?? null,
                            $grid[$x][$y + 1] ?? null,
                            $grid[$x + 1][$y + 1] ?? null,
                            $grid[$x + 1][$y] ?? null,
                            $grid[$x + 1][$y - 1] ?? null,
                            $grid[$x][$y - 1] ?? null,
                            $grid[$x - 1][$y - 1] ?? null,
                        ];

                        foreach ($others as $other) {
                            if ($other !== null && !$other->hasFlashed) {
                                $other->energyLevel++;
                            }
                        }
                    }
                }
            }
        }

        return $flashCounter;
    }
}
