<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day1;

use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day1 = new Day1();

        $day1->setDebugInput(<<<TXT
199
200
208
210
200
207
240
269
260
263
TXT
        );

        self::assertSame('7', $day1->solvePartOne());
    }

    public function testSolvePartOneWrong(): void
    {
        $day1 = new Day1();

        self::assertNotSame('100', $day1->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day1 = new Day1();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day1->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day1 = new Day1();

        $day1->setDebugInput(<<<TXT
199
200
208
210
200
207
240
269
260
263
TXT
        );

        self::assertSame('5', $day1->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day1 = new Day1();

        self::assertSame('1491', $day1->solvePartTwo());
    }
}
