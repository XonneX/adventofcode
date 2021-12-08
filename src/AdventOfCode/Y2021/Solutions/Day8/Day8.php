<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day8;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_diff;
use function array_intersect;
use function array_values;
use function count;
use function explode;
use function implode;
use function in_array;
use function print_r;
use function str_contains;
use function str_replace;
use function str_split;
use function strlen;
use function var_dump;

use const PHP_EOL;

class Day8 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 8);
    }

    protected function partOne(string $input): string
    {
        throw new RuntimeException('Not implemented yet');
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);

        $sum = 0;
        foreach ($lines as $line) {
            [$signals, $outputs] = explode(' | ', $line);
            $signals = explode(' ', $signals);
            $outputs = explode(' ', $outputs);

            $digits = [
                1 => null,
                2 => null,
                4 => null,
                7 => null,
                8 => null,
                9 => null,
            ];

            foreach ($signals as $key => $signal) {
                $len = strlen($signal);
                $signal = str_split($signal);

                if ($len === 2) {
                    $digits[1] = $signal;
                } elseif ($len === 4) {
                    $digits[4] = $signal;
                } elseif ($len === 3) {
                    $digits[7] = $signal;
                } elseif ($len === 7) {
                    $digits[8] = $signal;
                } else {
                    $signals[$key] = $signal;

                    continue;
                }

                unset($signals[$key]);
            }

            $shape = array_diff($digits[4], $digits[1]);
            $d56 = [];
            $d03 = [];

            foreach ($signals as $signal) {
                if ($this->allInThere($shape, $signal)) {
                    if ($this->allInThere($digits[1], $signal)) {
                        $digits[9] = $signal;

                        continue;
                    }

                    $d56[] = $signal;
                } else {
                    if (!$this->allInThere($digits[1], $signal)) {
                        $digits[2] = $signal;

                        continue;
                    }

                    $d03[] = $signal;
                }
            }

            if (count($d56[0]) > count($d56[1])) {
                $digits[5] = $d56[1];
                $digits[6] = $d56[0];
            } else {
                $digits[5] = $d56[0];
                $digits[6] = $d56[1];
            }

            if (count($d03[0]) > count($d03[1])) {
                $digits[0] = $d03[0];
                $digits[3] = $d03[1];
            } else {
                $digits[0] = $d03[1];
                $digits[3] = $d03[0];
            }

            $value = '';
            foreach ($outputs as $output) {
                $output = str_split($output);

                foreach ($digits as $digit => $letters) {
                    if ($this->same($output, $letters)) {
                        $value .= $digit;

                        break;
                    }
                }
            }

            $sum += (int) $value;
        }

        return (string) $sum;
    }

    public function allInThere(array $needles, array $haystack): bool
    {
        return count(array_diff($needles, $haystack)) < 1;
    }

    public function same(array $needles, array $haystack): bool
    {
        return count(array_diff($needles, $haystack)) < 1 && count(array_diff($haystack, $needles)) < 1;
    }
}
