<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day4;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function explode;

class Day4 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2022, 4);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        $count = 0;
        foreach ($lines as $line) {
            [$r1, $r2] = explode(',', $line);
            [$s1, $e1] = explode('-', $r1);
            [$s2, $e2] = explode('-', $r2);

            if (
                ($s1 >= $s2 && $e1 <= $e2)
                || ($s2 >= $s1 && $e2 <= $e1)
            ) {
                $count++;
            }
        }

        return (string) $count;
    }

    protected function partTwo(string $input): string
    {
        throw new RuntimeException('Not implemented yet');
    }
}
