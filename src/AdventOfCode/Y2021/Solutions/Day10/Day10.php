<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day10;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_pop;
use function explode;
use function implode;
use function in_array;
use function print_r;
use function sort;
use function str_split;
use function var_dump;

use const PHP_EOL;

class Day10 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 10);
    }

    protected function partOne(string $input): string
    {
        $charMap = [
            '(' => ')',
            '[' => ']',
            '{' => '}',
            '<' => '>',
        ];
        $points = 0;

        foreach (explode("\n", $input) as $line) {
            $chunkStarts = [];
            foreach (str_split($line) as $char) {
                if (in_array($char, ['[', '(', '<', '{'])) {
                    $chunkStarts[] = $char;
                    continue;
                }

                $chunkStart = array_pop($chunkStarts);

                if ($charMap[$chunkStart] !== $char) {
                    if ($char === ')') {
                        $points += 3;
                    } elseif ($char === ']') {
                        $points += 57;
                    } elseif ($char === '}') {
                        $points += 1197;
                    } elseif ($char === '>') {
                        $points += 25137;
                    }
                }
            }
        }

        return (string) $points;
    }

    protected function partTwo(string $input): string
    {
        $charMap = [
            '(' => ')',
            '[' => ']',
            '{' => '}',
            '<' => '>',
        ];
        $valueMap = [
            ')' => 1,
            ']' => 2,
            '}' => 3,
            '>' => 4,
        ];
        $scores = [];
        $lines = explode("\n", $input);

        foreach ($lines as $key => $line) {
            $chunkStarts = [];
            foreach (str_split($line) as $char) {
                if (in_array($char, ['[', '(', '<', '{'])) {
                    $chunkStarts[] = $char;
                    continue;
                }

                $chunkStart = array_pop($chunkStarts);

                if ($charMap[$chunkStart] !== $char) {
                    continue 2;
                }
            }

            $totalScore = 0;
            while (($chunkStart = array_pop($chunkStarts)) !== null) {
                $totalScore *= 5;
                $totalScore += $valueMap[$charMap[$chunkStart]];
            }
            $scores[] = $totalScore;
        }

        sort($scores);

        return (string) $scores[(count($scores) - 1) / 2];
    }
}
