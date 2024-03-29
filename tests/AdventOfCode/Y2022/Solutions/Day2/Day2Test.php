<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day2;

use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day2 = new Day2();

        $day2->setDebugInput(<<<TXT
A Y
B X
C Z
TXT
        );

        self::assertSame('15', $day2->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day2 = new Day2();

        self::assertSame('13565', $day2->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day2 = new Day2();

        $day2->setDebugInput(<<<TXT
A Y
B X
C Z
TXT
        );

        self::assertSame('12', $day2->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day2 = new Day2();

        self::assertSame('12424', $day2->solvePartTwo());
    }
}
