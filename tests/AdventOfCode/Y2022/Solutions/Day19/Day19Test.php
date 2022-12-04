<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day19;

use PHPUnit\Framework\TestCase;

class Day19Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day19 = new Day19();

        $day19->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day19->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day19 = new Day19();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day19->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day19 = new Day19();

        $day19->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day19->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day19 = new Day19();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day19->solvePartTwo());
    }
}
