<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day10;

use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_key_exists;
use function array_pop;
use function explode;
use function ksort;
use function max;
use function next;
use function sort;

class Day10 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2020, 10);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        sort($lines);

        $counts        = [
            1 => 0,
            2 => 0,
            3 => 0,
        ];
        $previousValue = 0;
        foreach ($lines as $value) {
            $counts[$value - $previousValue]++;
            $previousValue = $value;
        }

        $counts[3]++;

        return (string) ($counts[3] * $counts[1]);
    }

    protected function partTwo(string $input): string
    {
        $lines    = explode("\n", $input);
        $lines[]  = 0;
        $lines[]  = max($lines);
        $counters = [];

        foreach ($lines as $line) {
            $counters[(int) $line] = 0;
        }

        $counters[0] = 1;
        ksort($counters);
        $count = 1;

        do {
            $key = key($counters);

            for ($i = 1; $i < 4; $i++) {
                if (array_key_exists($key + $i, $counters)) {
                    $counters[$key + $i] += $count;
                }
            }
        } while ($count = next($counters));

        return (string) array_pop($counters);
    }
}
