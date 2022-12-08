<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day5;

use PHPUnit\Framework\TestCase;

class Day5Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day5 = new Day5();

        $day5->setDebugInput(<<<TXT
    [D]    
[N] [C]    
[Z] [M] [P]
 1   2   3 

move 1 from 2 to 1
move 3 from 1 to 3
move 2 from 2 to 1
move 1 from 1 to 2
TXT
        );

        self::assertSame('CMZ', $day5->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day5 = new Day5();

        self::assertSame('NTWZZWHFV', $day5->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day5 = new Day5();

        $day5->setDebugInput(<<<TXT
    [D]    
[N] [C]    
[Z] [M] [P]
 1   2   3 

move 1 from 2 to 1
move 3 from 1 to 3
move 2 from 2 to 1
move 1 from 1 to 2
TXT
        );

        self::assertSame('MCD', $day5->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day5 = new Day5();

        self::assertSame('BRZGFVBTJ', $day5->solvePartTwo());
    }
}
