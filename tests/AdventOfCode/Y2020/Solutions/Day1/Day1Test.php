<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day1;

use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day1 = new Day1();
        $day1->setDebugInput(<<<TXT
1721
979
366
299
675
1456
TXT
);

        self::assertSame('514579', $day1->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day1 = new Day1();

        self::assertSame('866436', $day1->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day1 = new Day1();
        $day1->setDebugInput(<<<TXT
1721
979
366
299
675
1456
TXT
        );

        self::assertSame('241861950', $day1->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day1 = new Day1();

        self::assertSame('276650720', $day1->solvePartTwo());
    }
}
