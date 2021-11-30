<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day20;

use PHPUnit\Framework\TestCase;

class Day20Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day20 = new Day20();

        $day20->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day20->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day20 = new Day20();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day20->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day20 = new Day20();

        $day20->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day20->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day20 = new Day20();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day20->solvePartTwo());
    }
}
