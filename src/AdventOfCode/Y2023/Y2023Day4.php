<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_fill;
use function array_sum;
use function explode;
use function in_array;
use function preg_match;
use function preg_match_all;
use function print_r;
use function var_dump;

use const PHP_EOL;

class Y2023Day4 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2023, 4);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        $sum = 0;
        foreach ($lines as $line) {
            preg_match('/Card +(\d*): ([0-9 ]*) \| ([0-9 ]*)/', $line, $matches);

            [, , $winningNumbers, $numbers] = $matches;
            $winningNumbers = explode(' ', $winningNumbers);
            $numbers = explode(' ', $numbers);

            $numCount = 0;

            foreach ($numbers as $number) {
                if ($number === '') {
                    continue;
                }

                if (in_array($number, $winningNumbers)) {
                    if ($numCount === 0) {
                        $numCount = 1;
                    } else {
                        $numCount *= 2;
                    }
                }
            }

            $sum += $numCount;
        }

        return (string) $sum;
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);

        $wins = [];
        foreach ($lines as $i => $line) {
            preg_match('/Card +(\d*): ([0-9 ]*) \| ([0-9 ]*)/', $line, $matches);

            [, $card, $winningNumbers, $numbers] = $matches;
            $winningNumbers = explode(' ', $winningNumbers);
            $numbers = explode(' ', $numbers);

            $numCount = 0;

            foreach ($numbers as $number) {
                if ($number === '') {
                    continue;
                }

                if (in_array($number, $winningNumbers)) {
                    $numCount++;
                }
            }

            $wins[$card] = $numCount;
        }

        $copies = array_fill(0, count($wins), 1);
        foreach ($wins as $card => $winCount) {
            if ($winCount !== 0) {
                for ($i = 0; $i < $copies[$card]; $i++) {
                    for ($j = 0; $j < $winCount; $j++) {
                        if (isset($copies[$card + 1 + $j])) {
                            $copies[$card + 1 + $j]++;
                        } else {
                            $copies[$card + 1 + $j] = 1;
                        }
                    }
                }
            }
        }

        return (string) array_sum($copies);
    }
}
