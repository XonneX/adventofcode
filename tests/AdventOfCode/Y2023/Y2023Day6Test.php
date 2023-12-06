<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use PHPUnit\Framework\TestCase;

class Y2023Day6Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day = new Y2023Day6();

        $day->setDebugInput(<<<TXT
Time:      7  15   30
Distance:  9  40  200
TXT
        );

        self::assertSame('288', $day->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day = new Y2023Day6();

        self::assertSame('503424', $day->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day = new Y2023Day6();

        $day->setDebugInput(<<<TXT
Time:      7  15   30
Distance:  9  40  200
TXT
        );

        self::assertSame('71503', $day->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day = new Y2023Day6();

        self::assertSame('32607562', $day->solvePartTwo());
    }
}
