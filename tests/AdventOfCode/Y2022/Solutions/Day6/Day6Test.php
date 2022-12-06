<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day6;

use PHPUnit\Framework\TestCase;

class Day6Test extends TestCase
{
    public function testSolvePartOneExample1(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
mjqjpqmgbljsphdztnvjfqwrcgsmlb
TXT
        );

        self::assertSame('7', $day6->solvePartOne());
    }

    public function testSolvePartOneExample2(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
bvwbjplbgvbhsrlpgdmjqwftvncz
TXT
        );

        self::assertSame('5', $day6->solvePartOne());
    }

    public function testSolvePartOneExample3(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
nppdvjthqldpwncqszvftbrmjlhg
TXT
        );

        self::assertSame('6', $day6->solvePartOne());
    }

    public function testSolvePartOneExample10(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg
TXT
        );

        self::assertSame('10', $day6->solvePartOne());
    }

    public function testSolvePartOneExample11(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw
TXT
        );

        self::assertSame('11', $day6->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day6 = new Day6();

        self::assertSame('1175', $day6->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day6 = new Day6();

        $day6->setDebugInput(<<<TXT
mjqjpqmgbljsphdztnvjfqwrcgsmlb
TXT
        );

        self::assertSame('19', $day6->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day6 = new Day6();

        self::assertSame('3217', $day6->solvePartTwo());
    }
}
