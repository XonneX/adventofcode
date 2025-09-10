<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use PHPUnit\Framework\TestCase;

class Y2023Day7Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day = new Y2023Day7();

        $day->setDebugInput(<<<TXT
32T3K 765
T55J5 684
KK677 28
KTJJT 220
QQQJA 483
TXT
        );

        self::assertSame('6440', $day->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day = new Y2023Day7();

        self::assertSame('254024898', $day->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day = new Y2023Day7();

        $day->setDebugInput(<<<TXT
32T3K 765
T55J5 684
KK677 28
KTJJT 220
QQQJA 483
TXT
        );

        self::assertSame('5905', $day->solvePartTwo());
    }

    public function testReplaceJokers(): void
    {
        $values = ['T','5','5','J','5'];
        $day = new Y2023Day7();
        $result = $day->replaceJokers($values);
        self::assertEquals(['T', '5', '5', '5', '5'], $result);
    }

    public function testSolvePartTwo(): void
    {
        $day = new Y2023Day7();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day->solvePartTwo());
    }
}
