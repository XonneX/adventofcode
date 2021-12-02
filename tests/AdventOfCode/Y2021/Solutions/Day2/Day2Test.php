<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day2;

use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day2 = new Day2();

        $day2->setDebugInput(<<<TXT
forward 5
down 5
forward 8
up 3
down 8
forward 2
TXT
        );

        self::assertSame('150', $day2->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day2 = new Day2();

        self::assertSame('1383564', $day2->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day2 = new Day2();

        $day2->setDebugInput(<<<TXT
forward 5
down 5
forward 8
up 3
down 8
forward 2
TXT
        );

        self::assertSame('900', $day2->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day2 = new Day2();

        self::assertSame('1488311643', $day2->solvePartTwo());
    }
}
