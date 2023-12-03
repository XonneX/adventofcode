<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use PHPUnit\Framework\TestCase;

class Y2023Day3Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day = new Y2023Day3();

        $day->setDebugInput(
            <<<TXT
467..114..
...*......
..35..633.
......#...
617*......
.....+.58.
..592.....
......755.
...$.*....
.664.598..
TXT
        );

        self::assertSame('4361', $day->solvePartOne());
    }
    public function testSolvePartOneExample2(): void
    {
        $day = new Y2023Day3();
// %36
        $day->setDebugInput(
            <<<TXT
%36
TXT
        );

        self::assertSame('36', $day->solvePartOne());
    }

    public function testSolvePartOneWrong(): void
    {
        $day = new Y2023Day3();

        self::assertNotSame('560570', $day->solvePartOne());
        self::assertTrue($day->solvePartOne() > 560570);
    }

    public function testSolvePartOne(): void
    {
        $day = new Y2023Day3();

        self::assertSame('560670', $day->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day = new Y2023Day3();

        $day->setDebugInput(
            <<<TXT
467..114..
...*......
..35..633.
......#...
617*......
.....+.58.
..592.....
......755.
...$.*....
.664.598..
TXT
        );

        self::assertSame('467835', $day->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day = new Y2023Day3();

        self::assertSame('91622824', $day->solvePartTwo());
    }
}
