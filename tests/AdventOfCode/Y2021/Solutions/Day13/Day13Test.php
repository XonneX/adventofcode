<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day13;

use PHPUnit\Framework\TestCase;

class Day13Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day13 = new Day13();

        $day13->setDebugInput(<<<TXT
6,10
0,14
9,10
0,3
10,4
4,11
6,0
6,12
4,1
0,13
10,12
3,4
3,0
8,4
1,10
2,14
8,10
9,0

fold along y=7
fold along x=5
TXT
        );

        self::assertSame('17', $day13->solvePartOne());
    }

    public function testSolvePartOneTooHigh(): void
    {
        $day13 = new Day13();

        self::assertLessThan('815', $day13->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day13 = new Day13();

        self::assertSame('693', $day13->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day13 = new Day13();

        $day13->setDebugInput(<<<TXT
6,10
0,14
9,10
0,3
10,4
4,11
6,0
6,12
4,1
0,13
10,12
3,4
3,0
8,4
1,10
2,14
8,10
9,0

fold along y=7
fold along x=5
fold along x=2
fold along y=3
TXT
        );

        $expected = '
#####
#...#
#...#
#...#
#####
.....
.....
';

        self::assertSame($expected, $day13->solvePartTwo());
    }

    public function testSolvePartTwoExampleTwo(): void
    {
        $day13 = new Day13();

        $day13->setDebugInput(<<<TXT
1049,1721
2686,1404
3385,2284
1380,2354
3134,2238
1413,563
2053,1247
2430,163
2334,1208
1221,798
444,1884
2656,2241
798,1473
3873,2314
318,1952
537,1032
2848,2551
3461,313
2053,248
3555,524
761,76
446,1596

fold along y=1279
fold along y=639
fold along y=319
fold along x=2047
fold along x=1023
fold along x=511
fold along x=255
fold along x=127
fold along y=159
fold along y=79
fold along x=63
fold along y=39
fold along x=31
fold along x=15
fold along y=19
TXT
        );

        self::assertSame('HELP', $day13->solvePartTwo());
    }

    public function testSolvePartTwoNot(): void
    {
        $day13 = new Day13();

        self::assertNotSame('UGLORAPU', $day13->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day13 = new Day13();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day13->solvePartTwo());
    }
}
