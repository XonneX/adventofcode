<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day22;

use PHPUnit\Framework\TestCase;

class Day22Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day22 = new Day22();

        $day22->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day22->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day22 = new Day22();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day22->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day22 = new Day22();

        $day22->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day22->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day22 = new Day22();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day22->solvePartTwo());
    }
}
