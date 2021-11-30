<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day8;

use PHPUnit\Framework\TestCase;

class Day8Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day8 = new Day8();

        $day8->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day8->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day8 = new Day8();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day8->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day8 = new Day8();

        $day8->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day8->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day8 = new Day8();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day8->solvePartTwo());
    }
}
