<?php

namespace XonneX\AdventOfCode\Y2021\Solutions\Day4;

use const PHP_EOL;

class Board
{
    private array $rowFirstGrid = [];
    private array $columnFirstGrid = [];

    public function __construct(array $grid)
    {
        $rowKey = 0;
        foreach ($grid as $row) {
            $columnKey = 0;
            foreach ($row as $number) {
                $this->rowFirstGrid[$rowKey][$columnKey] = [
                    'number' => $number,
                    'selected' => false,
                ];
                $this->columnFirstGrid[$columnKey][$rowKey] = [
                    'number' => $number,
                    'selected' => false,
                ];
                $columnKey++;
            }
            $rowKey++;
        }
    }

    public function draw(int $number, bool $debug = false): bool
    {
        foreach ($this->rowFirstGrid as $rowKey => $row) {
            foreach ($row as $columnKey => $state) {
                if ($state['number'] !== $number) {
                    continue;
                }

                $this->rowFirstGrid[$rowKey][$columnKey]['selected'] = true;
            }
        }

        foreach ($this->columnFirstGrid as $columnKey => $column) {
            foreach ($column as $rowKey => $state) {
                if ($state['number'] !== $number) {
                    continue;
                }

                $this->columnFirstGrid[$columnKey][$rowKey]['selected'] = true;
            }
        }

        if ($debug) {
            $this->debug();
        }

        return $this->checkWin();
    }

    private function checkWin(): bool
    {
        foreach ($this->rowFirstGrid as $row) {
            $win = true;

            foreach ($row as $state) {
                $win = $state['selected'] && $win;
            }

            if ($win) {
                return true;
            }
        }

        foreach ($this->columnFirstGrid as $column) {
            $win = true;

            foreach ($column as $state) {
                $win = $state['selected'] && $win;
            }

            if ($win) {
                return true;
            }
        }

        return false;
    }

    private function debug(): void
    {
        foreach ($this->rowFirstGrid as $row) {

            foreach ($row as $state) {
                ['number' => $number, 'selected' => $selected] = $state;

                if ($number > 9) {
                    if ($selected) {
                        echo '+';
                    } else {
                        echo ' ';
                    }
                } elseif ($selected) {
                    echo ' +';
                } else {
                    echo '  ';
                }

                echo $number;
            }

            echo PHP_EOL;
        }
        echo PHP_EOL;
        echo PHP_EOL;
    }

    public function getSumUnmarkedNumbers(): int
    {
        $sum = 0;

        foreach ($this->rowFirstGrid as $row) {
            foreach ($row as $value) {
                if ($value['selected']) {
                    continue;
                }

                $sum += $value['number'];
            }
        }

        return $sum;
    }
}
