<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day2;

use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day2 = new Day2();

        /** @noinspection SpellCheckingInspection */
        $day2->setDebugInput(<<<TXT
1-3 a: abcde
1-3 b: cdefg
2-9 c: ccccccccc
TXT
        );

        self::assertSame('2', $day2->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day2 = new Day2();

        self::assertSame('556', $day2->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day2 = new Day2();

        /** @noinspection SpellCheckingInspection */
        $day2->setDebugInput(<<<TXT
1-3 a: abcde
1-3 b: cdefg
2-9 c: ccccccccc
TXT
        );

        self::assertSame('1', $day2->solvePartTwo());
    }

    public function testSolvePartTwoWrongAnswerOne(): void
    {
        $day2 = new Day2();

        self::assertNotSame('407', $day2->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day2 = new Day2();

        self::assertSame('605', $day2->solvePartTwo());
    }
}
