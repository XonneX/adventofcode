<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day2;

use XonneX\AdventOfCode\Core\AbstractSolution;

use function explode;

class Day2 extends AbstractSolution
{
    private const ROCK = 1;
    private const PAPER = 2;
    private const SCISSORS = 3;

    private const WIN = [
        self::ROCK => self::PAPER,
        self::PAPER => self::SCISSORS,
        self::SCISSORS => self::ROCK,
    ];

    public function __construct()
    {
        parent::__construct(2022, 2);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        $score = 0;
        foreach ($lines as $line) {
            [$s1, $s2] = explode(' ', $line);

            $opponent = match($s1) {
                'A' => self::ROCK,
                'B' => self::PAPER,
                'C' => self::SCISSORS,
            };

            $me = match($s2) {
                'X' => self::ROCK,
                'Y' => self::PAPER,
                'Z' => self::SCISSORS,
            };

            $score += $me;

            if ($opponent === $me) {
                $score += 3;
            } elseif ($me === self::WIN[$opponent]) {
                $score += 6;
            }
        }

        return (string) $score;
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);

        $score = 0;
        foreach ($lines as $line) {
            [$s1, $s2] = explode(' ', $line);

            $opponent = match($s1) {
                'A' => self::ROCK,
                'B' => self::PAPER,
                'C' => self::SCISSORS,
            };

            if ($s2 === 'X') {
                $me = match($opponent) {
                    self::ROCK => self::SCISSORS,
                    self::PAPER => self::ROCK,
                    self::SCISSORS => self::PAPER,
                };
            } elseif ($s2 === 'Y') {
                $me = match($opponent) {
                    self::ROCK => self::ROCK,
                    self::PAPER => self::PAPER,
                    self::SCISSORS => self::SCISSORS,
                };
            } else {
                $me = self::WIN[$opponent];
            }

            $score += $me;

            if ($opponent === $me) {
                $score += 3;
            } elseif ($me === self::WIN[$opponent]) {
                $score += 6;
            }
        }

        return (string) $score;
    }
}
