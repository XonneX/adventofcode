<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023\Solutions\Day10;

use PHPUnit\Framework\TestCase;

class Day10Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day10 = new Day10();

        $day10->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day10->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day10 = new Day10();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day10->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day10 = new Day10();

        $day10->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day10->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day10 = new Day10();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day10->solvePartTwo());
    }
}
