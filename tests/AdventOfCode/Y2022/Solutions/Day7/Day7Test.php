<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day7;

use PHPUnit\Framework\TestCase;

class Day7Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day7 = new Day7();

        $day7->setDebugInput(<<<TXT
$ cd /
$ ls
dir a
14848514 b.txt
8504156 c.dat
dir d
$ cd a
$ ls
dir e
29116 f
2557 g
62596 h.lst
$ cd e
$ ls
584 i
$ cd ..
$ cd ..
$ cd d
$ ls
4060174 j
8033020 d.log
5626152 d.ext
7214296 k
TXT
        );

        self::assertSame('95437', $day7->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day7 = new Day7();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day7->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day7 = new Day7();

        $day7->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day7->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day7 = new Day7();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day7->solvePartTwo());
    }
}
