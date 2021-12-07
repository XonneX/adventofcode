<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day2;

use XonneX\AdventOfCode\Core\AbstractSolution;

class Day2 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 2);
    }

    protected function partOne(string $input): string
    {
        $horizontal = 0;
        $depth = 0;

        foreach (explode("\n", $input) as $command) {
            if (str_starts_with($command, 'forward')) {
                $value = (int) substr($command, 8);
                $horizontal += $value;
            } elseif (str_starts_with($command, 'down')) {
                $value = (int) substr($command, 5);
                $depth += $value;
            } else {
                $value = (int) substr($command, 3);
                $depth -= $value;
            }
        }

        return (string) ($horizontal * $depth);
    }

    protected function partTwo(string $input): string
    {
        $horizontal = 0;
        $depth = 0;
        $aim = 0;

        foreach (explode("\n", $input) as $command) {
            if (str_starts_with($command, 'forward')) {
                $value = (int) substr($command, 8);
                $horizontal += $value;
                $depth += $aim * $value;
            } elseif (str_starts_with($command, 'down')) {
                $value = (int) substr($command, 5);
                $aim += $value;
            } else {
                $value = (int) substr($command, 3);
                $aim -= $value;
            }
        }

        return (string) ($horizontal * $depth);
    }
}
