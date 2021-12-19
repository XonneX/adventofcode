<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day14;

use PHPUnit\Framework\TestCase;

class Day14Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day14 = new Day14();

        $day14->setDebugInput(<<<TXT
NNCB

CH -> B
HH -> N
CB -> H
NH -> C
HB -> C
HC -> B
HN -> C
NN -> C
BH -> H
NC -> B
NB -> B
BN -> B
BB -> N
BC -> B
CC -> N
CN -> C
TXT
        );

        self::assertSame('1588', $day14->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day14 = new Day14();

        self::assertSame('2657', $day14->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day14 = new Day14();

        $day14->setDebugInput(<<<TXT
NNCB

CH -> B
HH -> N
CB -> H
NH -> C
HB -> C
HC -> B
HN -> C
NN -> C
BH -> H
NC -> B
NB -> B
BN -> B
BB -> N
BC -> B
CC -> N
CN -> C
TXT
        );

        self::assertSame('2188189693529', $day14->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day14 = new Day14();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day14->solvePartTwo());
    }
}
