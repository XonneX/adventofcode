<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day1;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_key_exists;
use function explode;

use const PHP_EOL;

class Day1 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 1);
    }

    protected function partOne(string $input): string
    {
        $parts = explode("\n", $input);

        $previousPart = null;
        $incrementCount = 0;

        foreach ($parts as $part) {
            $part = (int) $part;

            if ($previousPart === null) {
                $previousPart = $part;

                continue;
            }

            if ($part > $previousPart) {
                $incrementCount++;
            }

            $previousPart = $part;
        }

        return (string) $incrementCount;
    }

    protected function partTwo(string $input): string
    {
        $parts = explode("\n", $input);

        $totals = [];

        foreach ($parts as $key => $part) {
            $part = (int) $part;

            if (!array_key_exists($key - 1, $parts) || !array_key_exists($key + 1, $parts)) {
                continue;
            }

            $totals[] = (int) $parts[$key - 1] + $part + (int) $parts[$key + 1];
        }

        $previousTotal = null;
        $incrementCount = 0;

        foreach ($totals as $total) {
            $total = (int) $total;

            if ($previousTotal === null) {
                $previousTotal = $total;

                continue;
            }

            if ($total > $previousTotal) {
                $incrementCount++;
            }

            $previousTotal = $total;
        }

        return (string) $incrementCount;
    }
}
