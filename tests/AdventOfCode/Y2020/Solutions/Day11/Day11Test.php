<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day11;

use PHPUnit\Framework\TestCase;

class Day11Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day11 = new Day11();

        /** @noinspection SpellCheckingInspection */
        $day11->setDebugInput(<<<TXT
L.LL.LL.LL
LLLLLLL.LL
L.L.L..L..
LLLL.LL.LL
L.LL.LL.LL
L.LLLLL.LL
..L.L.....
LLLLLLLLLL
L.LLLLLL.L
L.LLLLL.LL
TXT
        );

        self::assertSame('37', $day11->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day11 = new Day11();

        self::assertSame('2438', $day11->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day11 = new Day11();

        /** @noinspection SpellCheckingInspection */
        $day11->setDebugInput(<<<TXT
L.LL.LL.LL
LLLLLLL.LL
L.L.L..L..
LLLL.LL.LL
L.LL.LL.LL
L.LLLLL.LL
..L.L.....
LLLLLLLLLL
L.LLLLLL.L
L.LLLLL.LL
TXT
        );

        self::assertSame('26', $day11->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day11 = new Day11();

        self::assertSame('2174', $day11->solvePartTwo());
    }
}
