<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_filter;
use function array_product;
use function array_values;
use function explode;
use function str_replace;
use function substr;
use function var_dump;

use const PHP_EOL;

class Y2023Day6 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2023, 6);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);
        $times = array_values(array_filter(explode(" ", substr($lines[0], 9))));
        $distances = array_values(array_filter(explode(" ", substr($lines[1], 9))));

        $possibilities = [];
        foreach ($times as $key => $time) {
            [$startMs, $endMs] = $this->findStartEnd((int) $time, (int) $distances[$key]);

            $possibilities[] = ($endMs - $startMs + 1);
        }

        return (string) array_product($possibilities);
    }

    private function findStartEnd(int $time, int $distance): array
    {
        $startMs = 0;
        $endMs = 0;
        for ($ms = 1; $ms < $time; $ms++) {
            if ($startMs === 0) {
                if ($ms * ($time - $ms) > $distance) {
                    $startMs = $ms;
                }
            } elseif (($ms + 1) * ($time - $ms - 1) <= $distance) {
                $endMs = $ms;

                break;
            }
        }

        return [$startMs, $endMs];
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);
        $time = (int) str_replace(' ', '', substr($lines[0], 9));
        $distance = (int) str_replace(' ', '', substr($lines[1], 9));

        [$startMs, $endMs] = $this->findStartEnd($time, $distance);

        return (string) ($endMs - $startMs + 1);
    }
}
