<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day10;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function explode;

class Day10 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2022, 10);
    }

    protected function partOne(string $input): string
    {
        $x = 1;
        $cycle = 0;
        $signalStrength = 0;

        foreach (explode("\n", $input) as $instruction) {
            if ($instruction === 'noop') {
                $cycle++;

                if (($cycle - 20) % 40 === 0) {
                    $signalStrength += ($cycle * $x);
                }

                continue;
            }

            [, $val] = explode(' ', $instruction);
            $val = (int) $val;

            $cycle++;

            if (($cycle - 20) % 40 === 0) {
                $signalStrength += ($cycle * $x);
            }

            $cycle++;

            if (($cycle - 20) % 40 === 0) {
                $signalStrength += ($cycle * $x);
            }

            $x += $val;
        }

        return (string) $signalStrength;
    }

    protected function partTwo(string $input): string
    {
        throw new RuntimeException('Not implemented yet');
    }
}
