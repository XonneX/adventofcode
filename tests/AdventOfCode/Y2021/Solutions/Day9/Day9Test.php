<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day9;

use PHPUnit\Framework\TestCase;

class Day9Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day9 = new Day9();

        $day9->setDebugInput(<<<TXT
2199943210
3987894921
9856789892
8767896789
9899965678
TXT
        );

        self::assertSame('15', $day9->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day9 = new Day9();

        self::assertSame('633', $day9->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day9 = new Day9();

        $day9->setDebugInput(<<<TXT
2199943210
3987894921
9856789892
8767896789
9899965678
TXT
        );

        self::assertSame('1134', $day9->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day9 = new Day9();

        self::assertSame('1050192', $day9->solvePartTwo());
    }
}
