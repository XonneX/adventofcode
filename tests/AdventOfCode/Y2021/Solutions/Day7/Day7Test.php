<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day7;

use PHPUnit\Framework\TestCase;

class Day7Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day7 = new Day7();

        $day7->setDebugInput(<<<TXT
16,1,2,0,4,2,7,1,2,14
TXT
        );

        self::assertSame('37', $day7->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day7 = new Day7();

        self::assertSame('328262', $day7->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day7 = new Day7();

        $day7->setDebugInput(<<<TXT
16,1,2,0,4,2,7,1,2,14
TXT
        );

        self::assertSame('168', $day7->solvePartTwo());
    }

    public function testSolvePartTwoTooHigh(): void
    {
        $day7 = new Day7();

        self::assertLessThan('90041060', $day7->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day7 = new Day7();

        self::assertSame('90040997', $day7->solvePartTwo());
    }
}
