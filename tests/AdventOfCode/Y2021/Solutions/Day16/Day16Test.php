<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day16;

use PHPUnit\Framework\TestCase;

class Day16Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day16 = new Day16();

        $day16->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day16->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day16 = new Day16();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day16->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day16 = new Day16();

        $day16->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day16->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day16 = new Day16();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day16->solvePartTwo());
    }
}
