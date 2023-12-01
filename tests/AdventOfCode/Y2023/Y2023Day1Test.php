<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use PHPUnit\Framework\TestCase;

class Y2023Day1Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day = new Y2023Day1();

        $day->setDebugInput(<<<TXT
1abc2
pqr3stu8vwx
a1b2c3d4e5f
treb7uchet
TXT
        );

        self::assertSame('142', $day->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day = new Y2023Day1();

        self::assertSame('53921', $day->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day = new Y2023Day1();

        $day->setDebugInput(<<<TXT
two1nine
eightwothree
abcone2threexyz
xtwone3four
4nineeightseven2
zoneight234
7pqrstsixteen
TXT
        );

        self::assertSame('281', $day->solvePartTwo());
    }

    public function testSolvePartTwoExample2(): void
    {
        $day = new Y2023Day1();

        $day->setDebugInput(<<<TXT
1abc2
pqr3stu8vwx
a1b2c3d4e5f
treb7uchet
TXT
        );

        self::assertSame('142', $day->solvePartTwo());
    }

    public function testSolvePartTwoExample3(): void
    {
        $day = new Y2023Day1();

        $day->setDebugInput(<<<TXT
eighthree
TXT
        );

        self::assertSame('83', $day->solvePartTwo());
    }

    public function testSolvePartTwoWrong(): void
    {
        $day = new Y2023Day1();

        self::assertNotSame('51548', $day->solvePartTwo());
    }

    public function testSolvePartTwoWrong2(): void
    {
        $day = new Y2023Day1();

        self::assertNotSame('54678', $day->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day = new Y2023Day1();

        self::assertSame('54676', $day->solvePartTwo());
    }
}
