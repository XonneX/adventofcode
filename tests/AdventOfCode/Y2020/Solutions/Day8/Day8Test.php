<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day8;

use PHPUnit\Framework\TestCase;

class Day8Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day8 = new Day8();

        $day8->setDebugInput(<<<TXT
nop +0
acc +1
jmp +4
acc +3
jmp -3
acc -99
acc +1
jmp -4
acc +6
TXT
        );

        self::assertSame('5', $day8->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day8 = new Day8();

        self::assertSame('1563', $day8->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day8 = new Day8();

        $day8->setDebugInput(<<<TXT
nop +0
acc +1
jmp +4
acc +3
jmp -3
acc -99
acc +1
jmp -4
acc +6
TXT
        );

        self::assertSame('8', $day8->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day8 = new Day8();

        self::assertSame('767', $day8->solvePartTwo());
    }
}
