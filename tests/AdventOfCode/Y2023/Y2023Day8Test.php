<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use PHPUnit\Framework\TestCase;

class Y2023Day8Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day = new Y2023Day8();

        $day->setDebugInput(
            <<<TXT
RL

AAA = (BBB, CCC)
BBB = (DDD, EEE)
CCC = (ZZZ, GGG)
DDD = (DDD, DDD)
EEE = (EEE, EEE)
GGG = (GGG, GGG)
ZZZ = (ZZZ, ZZZ)
TXT
        );

        self::assertSame('2', $day->solvePartOne());
    }

    public function testSolvePartOneExample2(): void
    {
        $day = new Y2023Day8();

        $day->setDebugInput(
            <<<TXT
LLR

AAA = (BBB, BBB)
BBB = (AAA, ZZZ)
ZZZ = (ZZZ, ZZZ)
TXT
        );

        self::assertSame('6', $day->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day = new Y2023Day8();

        self::assertSame('18023', $day->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day = new Y2023Day8();

        $day->setDebugInput(
            <<<TXT
LR

11A = (11B, XXX)
11B = (XXX, 11Z)
11Z = (11B, XXX)
22A = (22B, XXX)
22B = (22C, 22C)
22C = (22Z, 22Z)
22Z = (22B, 22B)
XXX = (XXX, XXX)
TXT
        );

        self::assertSame('6', $day->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day = new Y2023Day8();

        self::assertSame('14449445933179', $day->solvePartTwo());
    }
}
