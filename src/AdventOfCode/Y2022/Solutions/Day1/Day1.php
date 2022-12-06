<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day1;

use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_pop;
use function explode;
use function sort;

class Day1 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2022, 1);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        $max = 0;
        $sum = 0;
        foreach ($lines as $line) {
            if ($line === '') {
                if ($sum > $max) {
                    $max = $sum;
                }

                $sum = 0;
            }

            $sum += (int) $line;
        }

        return (string) $max;
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);

        $max = [];
        $sum = 0;
        foreach ($lines as $line) {
            if ($line === '') {
                $max[] = $sum;
                $sum = 0;
            }

            $sum += (int) $line;
        }

        $max[] = $sum;

        sort($max);

        return (string) (
            array_pop($max)
            + array_pop($max)
            + array_pop($max)
        );
    }
}
