<?php

namespace XonneX\AdventOfCode\Y2021\Solutions\Day4;

use PHPUnit\Framework\TestCase;

class BoardTest extends TestCase
{
    private Board $board;

    protected function setUp(): void
    {
        $this->board = new Board(
            [
                [1, 2, 3, 4, 5],
                [6, 7, 8, 9, 10],
                [11, 12, 13, 14, 15],
            ]
        );
    }

    public function testDrawWinColumn(): void
    {
        $this->board->draw(1);
        $this->board->draw(6);
        $res = $this->board->draw(11);
        self::assertTrue($res);
    }

    public function testDrawWinRow(): void
    {
        $this->board->draw(1);
        $this->board->draw(2);
        $this->board->draw(3);
        $this->board->draw(4);
        $res = $this->board->draw(5);
        self::assertTrue($res);
    }

    public function testDrawLoose(): void
    {
        $this->board->draw(1);
        $this->board->draw(7);
        $res = $this->board->draw(11);
        self::assertFalse($res);
    }

}
