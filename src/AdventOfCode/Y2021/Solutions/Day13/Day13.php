<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day13;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_key_exists;
use function array_keys;
use function array_reverse;
use function explode;
use function ksort;
use function max;
use function print_r;
use function range;
use function substr;

use function var_dump;

use const PHP_EOL;

class Day13 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 13);
    }

    protected function partOne(string $input): string
    {
        [$dotsLines, $foldsLines] = explode("\n\n", $input);

        $maxX = 0;
        $maxY = 0;
        $grid = [];

        foreach (explode("\n", $dotsLines) as $line) {
            [$x, $y] = explode(',', $line);

            $grid[$y][$x] = true;

            if ($x > $maxX) {
                $maxX = $x;
            }

            if ($y > $maxY) {
                $maxY = $y;
            }
        }

        $tmpY = $maxY;
        while ($tmpY >= 0) {
            $tmpX = $maxX;

            while ($tmpX >= 0) {
                $foldValue = $grid[$tmpY][$tmpX] ?? null;

                if ($foldValue === null) {
                    $grid[$tmpY][$tmpX] = false;
                }

                $tmpX--;
            }

            ksort($grid[$tmpY]);

            $tmpY--;
        }
        ksort($grid);

        foreach (explode("\n", $foldsLines) as $foldLine) {
            $foldLine = substr($foldLine, 11);
            [$direction, $foldValue] = explode('=', $foldLine);

            $foldValue = (int) $foldValue;

            $tmpGrid = [];

            if ($direction === 'y') {
                foreach (range($foldValue + 1, $maxY) as $y) {
                    $tmpGrid[$y] = $grid[$y];
                    unset($grid[$y]);
                }

                unset($grid[$foldValue]);

                $tmpGrid = array_reverse($tmpGrid);
            } else {
                foreach ($grid as $y => $row) {
                    foreach (range($foldValue, $maxX) as $x) {
                        $value = $row[$x];

                        $tmpGrid[$y][$x] = $value;

                        unset($grid[$y][$x]);
                    }

                    $tmpGrid[$y] = array_reverse($tmpGrid[$y]);
                }
            }

            foreach ($tmpGrid as $y => $row) {
                foreach ($row as $x => $value) {
                    if (!$value) {
                        continue;
                    }

                    $grid[$y][$x] = $value;
                }
            }

            break;
        }

        $counter = 0;

        foreach ($grid as $row) {
            foreach ($row as $foldValue) {
                if ($foldValue) {
                    $counter++;
                }
            }
        }

        return (string) $counter;
    }

    protected function partTwo(string $input): string
    {
        [$dotsLines, $foldsLines] = explode("\n\n", $input);

        $maxX = 0;
        $maxY = 0;
        $grid = [];

        foreach (explode("\n", $dotsLines) as $line) {
            [$x, $y] = explode(',', $line);

            $grid[$y][$x] = true;

            if ($x > $maxX) {
                $maxX = $x;
            }

            if ($y > $maxY) {
                $maxY = $y;
            }
        }

        $tmpY = $maxY;
        while ($tmpY >= 0) {
            $tmpX = $maxX;

            while ($tmpX >= 0) {
                $foldValue = $grid[$tmpY][$tmpX] ?? null;

                if ($foldValue === null) {
                    $grid[$tmpY][$tmpX] = false;
                }

                $tmpX--;
            }

            ksort($grid[$tmpY]);

            $tmpY--;
        }
        ksort($grid);

        foreach (explode("\n", $foldsLines) as $foldLine) {
            $foldLine = substr($foldLine, 11);
            [$direction, $foldValue] = explode('=', $foldLine);

            $foldValue = (int) $foldValue;

            $tmpGrid = [];

            if ($direction === 'y') {
                foreach (range($foldValue + 1, $maxY) as $y) {
                    $tmpGrid[$y] = $grid[$y];
                    unset($grid[$y]);
                }

                unset($grid[$foldValue]);

                $maxY = max(array_keys($grid));

                $tmpGrid = array_reverse($tmpGrid);
            } else {
                foreach ($grid as $y => $row) {
                    foreach (range($foldValue + 1, $maxX) as $x) {
                        $value = $row[$x];

                        $tmpGrid[$y][$x] = $value;

                        unset($grid[$y][$x]);
                    }

                    unset($grid[$y][$foldValue]);

                    $tmpGrid[$y] = array_reverse($tmpGrid[$y]);
                }

                $maxX = max(array_keys($grid[$y]));
            }

            foreach ($tmpGrid as $y => $row) {
                foreach ($row as $x => $value) {
                    if (!$value) {
                        continue;
                    }

                    $grid[$y][$x] = $value;
                }
            }
        }

        return $this->dumpGrid($grid);
    }

    private function dumpGrid(array $grid): string
    {
        $res = PHP_EOL;

        foreach ($grid as $row) {
            foreach ($row as $value) {
                if ($value) {
                    $res .= '#';
                } else {
                    $res .= '.';
                }
            }

            $res .= PHP_EOL;
        }

        return $res;
    }
}
