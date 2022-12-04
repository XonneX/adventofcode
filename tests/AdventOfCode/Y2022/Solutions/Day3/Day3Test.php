<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day3;

use PHPUnit\Framework\TestCase;

class Day3Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day3 = new Day3();

        $day3->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day3->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day3 = new Day3();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day3->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day3 = new Day3();

        $day3->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day3->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day3 = new Day3();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day3->solvePartTwo());
    }
}
