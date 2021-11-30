<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day6;

use PHPUnit\Framework\TestCase;

class Day6Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
abc

a
b
c

ab
ac

a
a
a
a

b
TXT
        );

        self::assertSame('11', $day6->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day6 = new Day6();

        self::assertSame('7128', $day6->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
abc

a
b
c

ab
ac

a
a
a
a

b
TXT
        );

        self::assertSame('6', $day6->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day6 = new Day6();

        self::assertSame('3640', $day6->solvePartTwo());
    }
}
