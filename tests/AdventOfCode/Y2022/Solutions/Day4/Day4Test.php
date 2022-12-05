<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day4;

use PHPUnit\Framework\TestCase;

class Day4Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day4 = new Day4();

        $day4->setDebugInput(<<<TXT
2-4,6-8
2-3,4-5
5-7,7-9
2-8,3-7
6-6,4-6
2-6,4-8
TXT
        );

        self::assertSame('2', $day4->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day4 = new Day4();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day4->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day4 = new Day4();

        $day4->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day4->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day4 = new Day4();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day4->solvePartTwo());
    }
}
