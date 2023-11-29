<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023\Solutions\Day18;

use PHPUnit\Framework\TestCase;

class Day18Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day18 = new Day18();

        $day18->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day18->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day18 = new Day18();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day18->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day18 = new Day18();

        $day18->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day18->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day18 = new Day18();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day18->solvePartTwo());
    }
}
