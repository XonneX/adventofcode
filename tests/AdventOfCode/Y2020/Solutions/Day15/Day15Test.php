<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day15;

use PHPUnit\Framework\TestCase;

class Day15Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day15 = new Day15();

        $day15->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day15->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day15 = new Day15();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day15->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day15 = new Day15();

        $day15->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day15->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day15 = new Day15();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day15->solvePartTwo());
    }
}
