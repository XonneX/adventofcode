<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day9;

use PHPUnit\Framework\TestCase;

class Day9Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day9 = new Day9();

        $day9->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day9->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day9 = new Day9();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day9->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day9 = new Day9();

        $day9->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day9->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day9 = new Day9();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day9->solvePartTwo());
    }
}
