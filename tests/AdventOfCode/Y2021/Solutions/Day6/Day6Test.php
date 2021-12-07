<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day6;

use PHPUnit\Framework\TestCase;

class Day6Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
3,4,3,1,2
TXT
        );

        self::assertSame('5934', $day6->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day6 = new Day6();

        self::assertSame('359344', $day6->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
3,4,3,1,2
TXT
        );

        self::assertSame('26984457539', $day6->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day6 = new Day6();

        self::assertSame('1629570219571', $day6->solvePartTwo());
    }
}
