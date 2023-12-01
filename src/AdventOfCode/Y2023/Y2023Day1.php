<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_pop;
use function array_shift;
use function array_sum;
use function count;
use function explode;
use function is_int;
use function is_numeric;
use function preg_match_all;
use function str_split;
use function var_dump;

use const PHP_EOL;
use const PREG_SET_ORDER;

class Y2023Day1 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2023, 1);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);
        $arr = [];

        foreach ($lines as $line) {
            $num = '';
            $characters = str_split($line);
            $first = false;
            $lastNum = '';
            foreach ($characters as $character) {
                if (is_numeric($character)) {
                    $lastNum = $character;

                    if ($first === false) {
                        $first = true;
                        $num .= $character;
                    }
                }
            }

            $num .= $lastNum;
            $arr[] = $num;
        }

        return (string) array_sum($arr);
    }

    private static $map = [
        'one' => 1,
        'two' => 2,
        'three' => 3,
        'four' => 4,
        'five' => 5,
        'six' => 6,
        'seven' => 7,
        'eight' => 8,
        'nine' => 9,
    ];

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);
        $arr = [];

        foreach ($lines as $line) {
            preg_match_all(
                '/(?=(one|two|three|four|five|six|seven|eight|nine|[1-9]))/',
                $line,
                $matches,
                PREG_SET_ORDER,
            );

            $first = array_shift($matches)[1];
            $last = count($matches) > 0 ? array_pop($matches)[1] : $first;

            $first = self::$map[$first] ?? $first;
            $last = self::$map[$last] ?? $last;
            $arr[] = $first . $last;
        }

        return (string) array_sum($arr);
    }
}
