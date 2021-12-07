<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day4;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function count;
use function explode;

class Day4 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 4);
    }

    protected function partOne(string $input): string
    {
        $parts = explode("\n\n", $input);
        $draws = $parts[0];
        unset($parts[0]);

        $boards = [];
        foreach ($parts as $part) {
            $grid = explode("\n", $part);
            $rows = [];

            foreach ($grid as $row) {
                $numbers = explode(' ', $row);

                foreach ($numbers as $key => $number) {
                    if ($number === '') {
                        unset($numbers[$key]);
                        continue;
                    }

                    $numbers[$key] = (int) $number;
                }

                $rows[] = $numbers;
            }

            $boards[] = new Board($rows);
        }

        $draws = explode(',', $draws);

        foreach ($draws as $draw) {
            foreach ($boards as $board) {
                if (!$board->draw((int) $draw)) {
                    continue;
                }

                $sum = $board->getSumUnmarkedNumbers();

                return (string) ($sum * $draw);
            }
        }

        throw new RuntimeException('Developer fucked up');
    }

    protected function partTwo(string $input): string
    {
        $parts = explode("\n\n", $input);
        $draws = $parts[0];
        unset($parts[0]);

        $boards = [];
        foreach ($parts as $part) {
            $grid = explode("\n", $part);
            $rows = [];

            foreach ($grid as $row) {
                $numbers = explode(' ', $row);

                foreach ($numbers as $key => $number) {
                    if ($number === '') {
                        unset($numbers[$key]);
                        continue;
                    }

                    $numbers[$key] = (int) $number;
                }

                $rows[] = $numbers;
            }

            $boards[] = new Board($rows);
        }

        $draws = explode(',', $draws);
        $lastDraw = null;
        $lastBoard = null;

        foreach ($draws as $draw) {
            $lastDraw = $draw;

            foreach ($boards as $key => $board) {
                if (!$board->draw((int) $draw)) {
                    continue;
                }

                $lastBoard = $board;
                unset($boards[$key]);
            }

            if (count($boards) < 1) {
                break;
            }
        }

        $sum = $lastBoard->getSumUnmarkedNumbers();

        return (string) ($sum * $lastDraw);
    }
}
