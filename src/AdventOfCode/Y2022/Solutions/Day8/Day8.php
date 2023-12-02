<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day8;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function str_split;

class Day8 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2022, 8);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        $forest = [];

        $maxX = count($lines);
        $y = 0;
        foreach ($lines as $line) {
            $chars = str_split($line);
            $maxY = count($chars);
            $x = 0;
            foreach ($chars as $height) {
                $forest[$y][$x] = [
                    'height' => (int) $height,
                    'visible' => ($y === 0 || $x === 0 || $y === ($maxX - 1) || $x === ($maxY - 1)),
                ];
                $x++;
            }
            $y++;
        }

        foreach ($forest as $y => $row) {
            foreach ($row as $x => $tree) {
//                for(){}
            }
        }

        return 'asd';
    }

    protected function partTwo(string $input): string
    {
        throw new RuntimeException('Not implemented yet');
    }
}
