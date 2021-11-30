<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day3;

use PHPUnit\Framework\TestCase;

class Day3Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day3 = new Day3();

        $day3->setDebugInput(<<<TXT
..##.......
#...#...#..
.#....#..#.
..#.#...#.#
.#...##..#.
..#.##.....
.#.#.#....#
.#........#
#.##...#...
#...##....#
.#..#...#.#
TXT
        );

        self::assertSame('7', $day3->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day3 = new Day3();

        self::assertSame('259', $day3->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day3 = new Day3();

        $day3->setDebugInput(<<<TXT
..##.......
#...#...#..
.#....#..#.
..#.#...#.#
.#...##..#.
..#.##.....
.#.#.#....#
.#........#
#.##...#...
#...##....#
.#..#...#.#
TXT
        );

        self::assertSame('336', $day3->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day3 = new Day3();

        self::assertSame('2224913600', $day3->solvePartTwo());
    }
}
