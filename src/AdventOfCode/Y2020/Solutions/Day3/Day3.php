<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day3;

use XonneX\AdventOfCode\Core\AbstractSolution;

class Day3 extends AbstractSolution
{
    private const TREE = '#';

    public function __construct()
    {
        parent::__construct(2020, 3);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        $rows = [];
        foreach ($lines as $line) {
            $rows[] = str_split($line);
        }

        return (string) $this->calculateTreeEncountersForSlope($rows, 3, 1);
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);

        $rows = [];
        foreach ($lines as $line) {
            $rows[] = str_split($line);
        }

        return (string) (
            $this->calculateTreeEncountersForSlope($rows, 1, 1)
            * $this->calculateTreeEncountersForSlope($rows, 3, 1)
            * $this->calculateTreeEncountersForSlope($rows, 5, 1)
            * $this->calculateTreeEncountersForSlope($rows, 7, 1)
            * $this->calculateTreeEncountersForSlope($rows, 1, 2)
        );
    }

    private function calculateTreeEncountersForSlope(array $map, int $goRight, int $goDown): int
    {
        $maxX = count($map[0]);
        $maxY = count($map);
        $x    = 1;
        $y    = 1;

        $treeEncounterCounter = 0;

        while ($y < $maxY) {
            $x += $goRight;
            $y += $goDown;

            if ($x > $maxX) {
                $x -= $maxX;
            }

            $square = $map[$y - 1][$x - 1];

            if ($square === self::TREE) {
                $treeEncounterCounter++;
            }
        }

        return $treeEncounterCounter;
    }
}
