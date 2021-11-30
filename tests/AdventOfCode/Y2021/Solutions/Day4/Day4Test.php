<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day4;

use PHPUnit\Framework\TestCase;

class Day4Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day4 = new Day4();

        $day4->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day4->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day4 = new Day4();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day4->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day4 = new Day4();

        $day4->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day4->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day4 = new Day4();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day4->solvePartTwo());
    }
}
