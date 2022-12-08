<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day3;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_flip;
use function array_intersect;
use function array_merge;
use function array_pop;
use function array_reverse;
use function count;
use function explode;
use function implode;
use function in_array;
use function join;
use function range;
use function str_split;
use function strlen;
use function substr;
use function var_dump;

class Day3 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2022, 3);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        $priorities = array_merge(
            ['asd'],
            range('a', 'z'),
            range('A', 'Z'),
        );

        $priorities = array_flip($priorities);

        $sum = 0;
        foreach ($lines as $line) {
            $mid = strlen($line) / 2;
            $c1 = str_split(substr($line, 0, $mid));
            $c2 = str_split(substr($line, $mid));

            $common = null;
            foreach ($c1 as $c1t) {
                if (in_array($c1t, $c2, true)) {
                    $common = $c1t;
                    break;
                }
            }

            if ($common === null) {
                foreach ($c2 as $c2t) {
                    if (in_array($c2t, $c1, true)) {
                        $common = $c2t;
                        break;
                    }
                }
            }

            $sum += $priorities[$common];
        }

        return (string) $sum;
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);

        $priorities = array_merge(
            ['asd'],
            range('a', 'z'),
            range('A', 'Z'),
        );

        $priorities = array_flip($priorities);

        $sum = 0;
        $cl = (count($lines) / 3) - 1;
        for ($i = 0; $i <= $cl; $i++) {
            $s1 = str_split($lines[$i * 3]);
            $s2 = str_split($lines[$i * 3 + 1]);
            $s3 = str_split($lines[$i * 3 + 2]);

            $r = array_intersect($s1, $s2, $s3);
            $c = array_pop($r);
            $sum += $priorities[$c];
        }

        return (string) $sum;
    }
}
