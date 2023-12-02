<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use PHPUnit\Framework\TestCase;

class Y2023Day2Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day = new Y2023Day2();

        $day->setDebugInput(<<<TXT
Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green
TXT
        );

        self::assertSame('8', $day->solvePartOne());
    }

    public function testSolvePartOneWrong(): void
    {
        $day = new Y2023Day2();

        self::assertNotSame('2399', $day->solvePartOne());
        self::assertTrue($day->solvePartOne() > 2399);
    }

    public function testSolvePartOne(): void
    {
        $day = new Y2023Day2();

        self::assertSame('2913', $day->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day = new Y2023Day2();

        $day->setDebugInput(<<<TXT
Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green
TXT
        );

        self::assertSame('2286', $day->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day = new Y2023Day2();

        self::assertSame('55593', $day->solvePartTwo());
    }
}
