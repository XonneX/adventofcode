<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day24;

use PHPUnit\Framework\TestCase;

class Day24Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day24 = new Day24();

        $day24->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day24->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day24 = new Day24();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day24->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day24 = new Day24();

        $day24->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day24->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day24 = new Day24();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day24->solvePartTwo());
    }
}
