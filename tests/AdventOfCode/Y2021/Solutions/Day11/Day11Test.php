<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day11;

use PHPUnit\Framework\TestCase;

class Day11Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day11 = new Day11();

        $day11->setDebugInput(<<<TXT
5483143223
2745854711
5264556173
6141336146
6357385478
4167524645
2176841721
6882881134
4846848554
5283751526
TXT
        );

        self::assertSame('1656', $day11->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day11 = new Day11();

        self::assertSame('1644', $day11->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day11 = new Day11();

        $day11->setDebugInput(<<<TXT
5483143223
2745854711
5264556173
6141336146
6357385478
4167524645
2176841721
6882881134
4846848554
5283751526
TXT
        );

        self::assertSame('195', $day11->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day11 = new Day11();

        self::assertSame('229', $day11->solvePartTwo());
    }
}
