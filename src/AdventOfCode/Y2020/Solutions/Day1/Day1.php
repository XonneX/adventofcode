<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day1;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

class Day1 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2020, 1);
    }

    protected function partOne(string $input): string
    {
        $parts = explode("\n", $input);

        foreach ($parts as $part1) {
            $part1 = (int) $part1;

            foreach ($parts as $part2) {
                $part2 = (int) $part2;

                if ($part1 + $part2 === 2020) {
                    return (string) ($part1 * $part2);
                }
            }
        }

        throw new RuntimeException('Not working');
    }

    protected function partTwo(string $input): string
    {
        $parts = explode("\n", $input);

        foreach ($parts as $part1) {
            $part1 = (int) $part1;

            foreach ($parts as $part2) {
                $part2 = (int) $part2;

                foreach ($parts as $part3) {
                    $part3 = (int) $part3;

                    if ($part1 + $part2 + $part3 === 2020) {
                        return (string) ($part1 * $part2 * $part3);
                    }
                }
            }
        }

        throw new RuntimeException('Not working');
    }
}
