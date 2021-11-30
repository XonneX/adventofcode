<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day7;

use PHPUnit\Framework\TestCase;

class Day7Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day7 = new Day7();

        $day7->setDebugInput(
            <<<TXT
light red bags contain 1 bright white bag, 2 muted yellow bags.
dark orange bags contain 3 bright white bags, 4 muted yellow bags.
bright white bags contain 1 shiny gold bag.
muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.
shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.
dark olive bags contain 3 faded blue bags, 4 dotted black bags.
vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.
faded blue bags contain no other bags.
dotted black bags contain no other bags.
TXT
        );

        self::assertSame('4', $day7->solvePartOne());
    }

    public function testSolvePartOneWrongAnswerOne(): void
    {
        $day7 = new Day7();

        self::assertNotSame('158', $day7->solvePartOne());
        self::assertTrue((int) $day7->solvePartOne() < 158);
    }

    public function testSolvePartOne(): void
    {
        $day7 = new Day7();

        self::assertSame('131', $day7->solvePartOne());
    }

    public function testSolvePartTwoExampleOne(): void
    {
        $day7 = new Day7();

        $day7->setDebugInput(
            <<<TXT
light red bags contain 1 bright white bag, 2 muted yellow bags.
dark orange bags contain 3 bright white bags, 4 muted yellow bags.
bright white bags contain 1 shiny gold bag.
muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.
shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.
dark olive bags contain 3 faded blue bags, 4 dotted black bags.
vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.
faded blue bags contain no other bags.
dotted black bags contain no other bags.
TXT
        );

        self::assertSame('32', $day7->solvePartTwo());
    }

    public function testSolvePartTwoExampleTwo(): void
    {
        $day7 = new Day7();

        $day7->setDebugInput(
            <<<TXT
shiny gold bags contain 2 dark red bags.
dark red bags contain 2 dark orange bags.
dark orange bags contain 2 dark yellow bags.
dark yellow bags contain 2 dark green bags.
dark green bags contain 2 dark blue bags.
dark blue bags contain 2 dark violet bags.
dark violet bags contain no other bags.
TXT
        );

        self::assertSame('126', $day7->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day7 = new Day7();

        self::assertSame('11261', $day7->solvePartTwo());
    }
}
