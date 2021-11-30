<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day12;

use PHPUnit\Framework\TestCase;

class Day12Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day12 = new Day12();

        $day12->setDebugInput(<<<TXT
F10
N3
F7
R90
F11
TXT
        );

        self::assertSame('25', $day12->solvePartOne());
    }

    public function testSolvePartOneWrong(): void
    {
        $day12 = new Day12();

        self::assertNotSame('761', $day12->solvePartOne());
        self::assertTrue($day12->solvePartOne() > 761);
    }

    public function testSolvePartOne(): void
    {
        $day12 = new Day12();

        self::assertSame('1565', $day12->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day12 = new Day12();

        $day12->setDebugInput(<<<TXT
F10
N3
F7
R90
F11
TXT
        );

        self::assertSame('286', $day12->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day12 = new Day12();

        self::assertSame('78883', $day12->solvePartTwo());
    }
}
