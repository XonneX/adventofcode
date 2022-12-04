<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day13;

use PHPUnit\Framework\TestCase;

class Day13Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day13 = new Day13();

        $day13->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day13->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day13 = new Day13();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day13->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day13 = new Day13();

        $day13->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day13->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day13 = new Day13();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day13->solvePartTwo());
    }
}
