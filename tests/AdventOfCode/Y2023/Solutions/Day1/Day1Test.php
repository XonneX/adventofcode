<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023\Solutions\Day1;

use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day1 = new Day1();

        $day1->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day1->solvePartOne());
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
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day1->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day1 = new Day1();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day1->solvePartTwo());
    }
}
