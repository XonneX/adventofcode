<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day10;

use PHPUnit\Framework\TestCase;

class Day10Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day10 = new Day10();

        $day10->setDebugInput(<<<TXT
[({(<(())[]>[[{[]{<()<>>
[(()[<>])]({[<{<<[]>>(
{([(<{}[<>[]}>{[]{[(<()>
(((({<>}<{<{<>}{[]{[]{}
[[<[([]))<([[{}[[()]]]
[{[{({}]{}}([{[{{{}}([]
{<[[]]>}<{[{[{[]{()[[[]
[<(<(<(<{}))><([]([]()
<{([([[(<>()){}]>(<<{{
<{([{{}}[<[[[<>{}]]]>[]]
TXT
        );

        self::assertSame('26397', $day10->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day10 = new Day10();

        self::assertSame('413733', $day10->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day10 = new Day10();

        $day10->setDebugInput(<<<TXT
[({(<(())[]>[[{[]{<()<>>
[(()[<>])]({[<{<<[]>>(
{([(<{}[<>[]}>{[]{[(<()>
(((({<>}<{<{<>}{[]{[]{}
[[<[([]))<([[{}[[()]]]
[{[{({}]{}}([{[{{{}}([]
{<[[]]>}<{[{[{[]{()[[[]
[<(<(<(<{}))><([]([]()
<{([([[(<>()){}]>(<<{{
<{([{{}}[<[[[<>{}]]]>[]]
TXT
        );

        self::assertSame('288957', $day10->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day10 = new Day10();

        self::assertSame('3354640192', $day10->solvePartTwo());
    }
}
