<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day14;

use PHPUnit\Framework\TestCase;

class Day14Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day14 = new Day14();

        $day14->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day14->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day14 = new Day14();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day14->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day14 = new Day14();

        $day14->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day14->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day14 = new Day14();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day14->solvePartTwo());
    }
}
