<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day3;

use PHPUnit\Framework\TestCase;

class Day3Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day3 = new Day3();

        $day3->setDebugInput(<<<TXT
vJrwpWtwJgWrhcsFMMfFFhFp
jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL
PmmdzqPrVvPwwTWBwg
wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn
ttgJtRGJQctTZtZT
CrZsJsPPZsGzwwsLwLmpwMDw
TXT
        );

        self::assertSame('157', $day3->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day3 = new Day3();

        self::assertSame('8105', $day3->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day3 = new Day3();

        $day3->setDebugInput(<<<TXT
vJrwpWtwJgWrhcsFMMfFFhFp
jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL
PmmdzqPrVvPwwTWBwg
wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn
ttgJtRGJQctTZtZT
CrZsJsPPZsGzwwsLwLmpwMDw
TXT
        );

        self::assertSame('70', $day3->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day3 = new Day3();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day3->solvePartTwo());
    }
}
