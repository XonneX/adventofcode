<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day5;

use PHPUnit\Framework\TestCase;

class Day5Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day5 = new Day5();

        $day5->setDebugInput(<<<TXT
0,9 -> 5,9
8,0 -> 0,8
9,4 -> 3,4
2,2 -> 2,1
7,0 -> 7,4
6,4 -> 2,0
0,9 -> 2,9
3,4 -> 1,4
0,0 -> 8,8
5,5 -> 8,2
TXT
        );

        self::assertSame('5', $day5->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day5 = new Day5();

        self::assertSame('3990', $day5->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day5 = new Day5();

        $day5->setDebugInput(<<<TXT
0,9 -> 5,9
8,0 -> 0,8
9,4 -> 3,4
2,2 -> 2,1
7,0 -> 7,4
6,4 -> 2,0
0,9 -> 2,9
3,4 -> 1,4
0,0 -> 8,8
5,5 -> 8,2
TXT
        );

        self::assertSame('12', $day5->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day5 = new Day5();

        self::assertSame('21305', $day5->solvePartTwo());
    }
}
