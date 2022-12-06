<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day6;

use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_shift;
use function array_unique;
use function count;
use function str_split;

class Day6 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2022, 6);
    }

    protected function partOne(string $input): string
    {
        $chars = str_split($input);
        $recentChars = [];
        $i = 0;

        foreach ($chars as $char) {
            $i++;

            $count = count($recentChars);
            if ($count === 4) {
                array_shift($recentChars);
            }

            $recentChars[] = $char;

            if ($count !== 3 && $count !== 4) {
                continue;
            }

            if (count(array_unique($recentChars)) === 4) {
                break;
            }
        }

        return (string) $i;
    }

    protected function partTwo(string $input): string
    {
        $chars = str_split($input);
        $recentChars = [];
        $i = 0;

        foreach ($chars as $char) {
            $i++;

            $count = count($recentChars);
            if ($count === 14) {
                array_shift($recentChars);
            }

            $recentChars[] = $char;

            if ($count !== 13 && $count !== 14) {
                continue;
            }

            if (count(array_unique($recentChars)) === 14) {
                break;
            }
        }

        return (string) $i;
    }
}
