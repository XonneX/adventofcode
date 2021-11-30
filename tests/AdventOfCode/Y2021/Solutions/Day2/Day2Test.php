<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day2;

use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day2 = new Day2();

        $day2->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day2->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day2 = new Day2();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day2->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day2 = new Day2();

        $day2->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day2->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day2 = new Day2();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day2->solvePartTwo());
    }
}
