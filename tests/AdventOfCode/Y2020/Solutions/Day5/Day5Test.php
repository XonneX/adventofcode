<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day5;

use PHPUnit\Framework\TestCase;

class Day5Test extends TestCase
{
    /** @noinspection SpellCheckingInspection */
    public function testSolvePartOneExample(): void
    {
        $day5 = new Day5();

        self::assertSame(357, $day5->calculateSeatId('FBFBBFFRLR'));
        self::assertSame(567, $day5->calculateSeatId('BFFFBBFRRR'));
        self::assertSame(119, $day5->calculateSeatId('FFFBBBFRRR'));
        self::assertSame(820, $day5->calculateSeatId('BBFFBBFRLL'));
    }

    public function testSolvePartOne(): void
    {
        $day5 = new Day5();

        self::assertSame('987', $day5->solvePartOne());
    }

    public function testSolvePartTwo(): void
    {
        $day5 = new Day5();

        self::assertSame('603', $day5->solvePartTwo());
    }
}
