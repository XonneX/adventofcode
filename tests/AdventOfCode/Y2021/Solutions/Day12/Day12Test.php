<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day12;

use PHPUnit\Framework\TestCase;

class Day12Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day12 = new Day12();

        $day12->setDebugInput(<<<TXT
fs-end
he-DX
fs-he
start-DX
pj-DX
end-zg
zg-sl
zg-pj
pj-he
RW-he
fs-DX
pj-RW
zg-RW
start-pj
he-WI
zg-he
pj-fs
start-RW
TXT
        );

        self::assertSame('226', $day12->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day12 = new Day12();

        self::assertSame('5254', $day12->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day12 = new Day12();

        $day12->setDebugInput(<<<TXT
fs-end
he-DX
fs-he
start-DX
pj-DX
end-zg
zg-sl
zg-pj
pj-he
RW-he
fs-DX
pj-RW
zg-RW
start-pj
he-WI
zg-he
pj-fs
start-RW
TXT
        );

        self::assertSame('3509', $day12->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day12 = new Day12();

        self::assertSame('149385', $day12->solvePartTwo());
    }
}
