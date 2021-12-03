<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day3;

use PHPUnit\Framework\TestCase;

class Day3Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day3 = new Day3();

        $day3->setDebugInput(<<<TXT
00100
11110
10110
10111
10101
01111
00111
11100
10000
11001
00010
01010
TXT
        );

        self::assertSame('198', $day3->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day3 = new Day3();

        self::assertSame('2972336', $day3->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day3 = new Day3();

        $day3->setDebugInput(<<<TXT
00100
11110
10110
10111
10101
01111
00111
11100
10000
11001
00010
01010
TXT
        );

        self::assertSame('230', $day3->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day3 = new Day3();

        self::assertSame('3368358', $day3->solvePartTwo());
    }
}
