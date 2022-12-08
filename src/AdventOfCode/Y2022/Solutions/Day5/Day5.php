<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day5;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_pop;
use function array_reverse;
use function array_shift;
use function array_unshift;
use function count;
use function exp;
use function explode;
use function ksort;
use function preg_match;
use function print_r;
use function str_split;
use function substr;
use function var_dump;

class Day5 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2022, 5);
    }

    protected function partOne(string $input): string
    {
        [$stacksInput, $moves] = explode("\n\n", $input);
        $stacksInput = explode("\n", $stacksInput);
        array_pop($stacksInput);

        $stacks = [];

        foreach ($stacksInput as $row) {
            $chars = str_split($row);

            $stackId = 1;
            $cChars = count($chars);

            while ($cChars > 0) {
                array_shift($chars);
                $char = array_shift($chars);
                array_shift($chars);

                if ($char !== ' ') {
                    $stacks[$stackId][] = $char;
                }

                $cChars = count($chars);
                if ($cChars > 0) {
                    array_shift($chars);
                }

                $stackId++;
            }
        }

        foreach (explode("\n", $moves) as $move) {
            $re = '/move (.*) from (.*) to (.*)/m';

            preg_match($re, $move, $matches);
            [, $amount, $from, $to] = $matches;

            for ($i = 0; $i < $amount; $i++) {
                $char = array_shift($stacks[$from]);
                array_unshift($stacks[$to], $char);
            }
        }

        $str = '';
        ksort($stacks);

        foreach ($stacks as $stack) {
            $str .= array_shift($stack);
        }

        return $str;
    }

    protected function partTwo(string $input): string
    {
        [$stacksInput, $moves] = explode("\n\n", $input);
        $stacksInput = explode("\n", $stacksInput);
        array_pop($stacksInput);

        $stacks = [];

        foreach ($stacksInput as $row) {
            $chars = str_split($row);

            $stackId = 1;
            $cChars = count($chars);

            while ($cChars > 0) {
                array_shift($chars);
                $char = array_shift($chars);
                array_shift($chars);

                if ($char !== ' ') {
                    $stacks[$stackId][] = $char;
                }

                $cChars = count($chars);
                if ($cChars > 0) {
                    array_shift($chars);
                }

                $stackId++;
            }
        }

        foreach (explode("\n", $moves) as $move) {
            $re = '/move (.*) from (.*) to (.*)/m';

            preg_match($re, $move, $matches);
            [, $amount, $from, $to] = $matches;

            $chars = [];
            for ($i = 0; $i < $amount; $i++) {
                $chars[] = array_shift($stacks[$from]);
            }

            $chars = array_reverse($chars);

            foreach ($chars as $char) {
                array_unshift($stacks[$to], $char);
            }
        }

        $str = '';
        ksort($stacks);

        foreach ($stacks as $stack) {
            $str .= array_shift($stack);
        }

        return $str;
    }
}
