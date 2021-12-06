<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day6;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_fill;
use function array_sum;

class Day6 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 6);
    } 

    protected function partOne(string $input): string
    {
        throw new RuntimeException('Not implemented yet');
    }

    protected function partTwo(string $input): string
    {
        $states = explode(',', $input);

        $counts = array_fill(0, 9, 0);

        foreach ($states as $state) {
            $counts[$state]++;
        }

        for ($i = 0; $i < 256; $i++) {
            $newCounts = array_fill(0, 9, 0);

            foreach ($counts as $key => $count) {
                if ($key === 0) {
                    $newCounts[6] += $count;
                    $newCounts[8] += $count;
                } else {
                    $newCounts[$key - 1] += $count;
                }
            }

            $counts = $newCounts;
        }

        return (string) array_sum($counts);
    }
}
