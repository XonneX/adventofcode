<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023\Solutions\Day6;

use PHPUnit\Framework\TestCase;

class Day6Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day6->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day6 = new Day6();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day6->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day6->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day6 = new Day6();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day6->solvePartTwo());
    }
}
