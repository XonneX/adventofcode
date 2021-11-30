<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day10;

use PHPUnit\Framework\TestCase;

class Day10Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day10 = new Day10();

        $day10->setDebugInput(
            <<<TXT
28
33
18
42
31
14
46
20
48
47
24
23
49
45
19
38
39
11
1
32
25
35
8
17
7
9
4
2
34
10
3
TXT
        );

        self::assertSame('220', $day10->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day10 = new Day10();

        self::assertSame('1625', $day10->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day10 = new Day10();

        $day10->setDebugInput(
            <<<TXT
28
33
18
42
31
14
46
20
48
47
24
23
49
45
19
38
39
11
1
32
25
35
8
17
7
9
4
2
34
10
3
TXT
        );

        self::assertSame('19208', $day10->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day10 = new Day10();

        self::assertSame((string) 3_100_448_333_024, $day10->solvePartTwo());
    }
}
