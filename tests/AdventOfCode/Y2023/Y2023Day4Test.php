<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use PHPUnit\Framework\TestCase;

class Y2023Day4Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day = new Y2023Day4();

        $day->setDebugInput(<<<TXT
Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53
Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19
Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1
Card 4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83
Card 5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36
Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11
TXT
        );

        self::assertSame('13', $day->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day = new Y2023Day4();

        self::assertSame('25183', $day->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day = new Y2023Day4();

        $day->setDebugInput(<<<TXT
Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53
Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19
Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1
Card 4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83
Card 5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36
Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11
TXT
        );

        self::assertSame('30', $day->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day = new Y2023Day4();

        self::assertSame('5667240', $day->solvePartTwo());
    }
}
