<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day21;

use PHPUnit\Framework\TestCase;

class Day21Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day21 = new Day21();

        $day21->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day21->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day21 = new Day21();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day21->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day21 = new Day21();

        $day21->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day21->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day21 = new Day21();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day21->solvePartTwo());
    }
}
