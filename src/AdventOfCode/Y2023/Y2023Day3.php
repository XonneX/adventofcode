<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_merge;
use function array_push;
use function array_sum;
use function array_unique;
use function explode;
use function is_numeric;
use function preg_match_all;
use function str_split;
use function strlen;
use function var_dump;

use const PHP_EOL;

class Y2023Day3 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2023, 3);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        $map = [];
        $y = 0;
        foreach ($lines as $line) {
            $chars = str_split($line);

            $x = 0;
            foreach ($chars as $char) {
                $map[$y][$x] = $char;
                $x++;
            }

            $y++;
        }

        $nums = [];
        foreach ($map as $y => $chars) {
            $num = '';
            $keepNum = false;
            foreach ($chars as $x => $char) {
                if (is_numeric($char)) {
                    $num .= $char;

                    if (
                        (isset($map[$y][$x + 1]) && !is_numeric($tmp = $map[$y][$x + 1]) && $tmp !== '.')        // right
                        || (isset($map[$y][$x - 1]) && !is_numeric($tmp = $map[$y][$x - 1]) && $tmp !== '.')     // left
                        || (isset($map[$y + 1][$x]) && !is_numeric($tmp = $map[$y + 1][$x]) && $tmp !== '.')     // bottom
                        || (isset($map[$y - 1][$x]) && !is_numeric($tmp = $map[$y - 1][$x]) && $tmp !== '.')     // top
                        || (isset($map[$y - 1][$x + 1]) && !is_numeric($tmp = $map[$y - 1][$x + 1]) && $tmp !== '.') // right top
                        || (isset($map[$y + 1][$x + 1]) && !is_numeric($tmp = $map[$y + 1][$x + 1]) && $tmp !== '.') // right bottom
                        || (isset($map[$y - 1][$x - 1]) && !is_numeric($tmp = $map[$y - 1][$x - 1]) && $tmp !== '.') // left top
                        || (isset($map[$y + 1][$x - 1]) && !is_numeric($tmp = $map[$y + 1][$x - 1]) && $tmp !== '.') // left bottom
                    ) {
                        $keepNum = true;
                    }
                } else {
                    if ($keepNum) {
                        $nums[] = $num;
                        $keepNum = false;
                    }

                    $num = '';
                }
            }

            if ($keepNum) {
                $nums[] = $num;
            }
        }

        return (string) array_sum($nums);
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);

        $characters = [];
        foreach ($lines as $y => $line) {
            foreach (str_split($line) as $x => $char) {
                $characters[$y . ',' . $x] = $char;
            }
        }

        $gears = [];
        foreach ($lines as $i => $line) {
            preg_match_all('/(\d+)/', $line, $matches, PREG_OFFSET_CAPTURE);

            foreach ($matches[0] as $match) {
                [$number, $position] = $match;

                for ($y = $i - 1; $y < $i + 2; $y++) {
                    for ($x = $position - 1; $x < $position + strlen($number) + 1; $x++) {
                        $index = $y . ',' . $x;
                        if (isset($characters[$index]) && $characters[$index] === '*') {
                            $gears[$y . ',' . $x][] = $number;
                        }
                    }
                }
            }
        }

        $nums = [];
        foreach ($gears as $gear) {
            if (count($gear) === 2) {
                $nums[] = $gear[0] * $gear[1];
            }
        }

        return (string) array_sum($nums);
    }
}
