<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day9;

use PHPUnit\Framework\TestCase;

class Day9Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day9 = new Day9();

        $lines = explode(
            "\n",
            <<<TXT
35
20
15
25
47
40
62
55
65
95
102
117
150
182
127
219
299
277
309
576
TXT
        );

        self::assertSame('127', $day9->findNotMatchingNumber(5, $lines));
    }

    public function testSolvePartOne(): void
    {
        $day9 = new Day9();

        self::assertSame('29221323', $day9->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day9 = new Day9();

        $lines = explode(
            "\n",
            <<<TXT
35
20
15
25
47
40
62
55
65
95
102
117
150
182
127
219
299
277
309
576
TXT
        );

        self::assertSame('62', $day9->findSumOfNotMatchingNumber(5, $lines));
    }

    public function testSolvePartTwo(): void
    {
        $day9 = new Day9();

        self::assertSame('4389369', $day9->solvePartTwo());
    }
}
