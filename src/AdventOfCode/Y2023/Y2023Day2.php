<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function explode;
use function preg_match;
use function preg_match_all;
use function var_dump;

class Y2023Day2 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2023, 2);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        $result = 0;
        foreach ($lines as $line) {
            preg_match('/Game ([0-9]+): (.*)/', $line, $matches);

            preg_match_all('/([0-9]+) (red|blue|green)/', $matches[2], $matches2);

            $possible = true;

            foreach ($matches2[1] as $key => $amount) {
                $comp = match ($matches2[2][$key]) {
                    'red' => 12,
                    'green' => 13,
                    'blue' => 14,
                };

                if ($amount > $comp) {
                    $possible = false;

                    break;
                }
            }

            if ($possible) {
                $result += $matches[1];
            }
        }

        return (string) $result;
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);

        $result = 0;
        foreach ($lines as $line) {
            preg_match('/Game ([0-9]+): (.*)/', $line, $matches);

            $minRed = 0;
            $minBlue = 0;
            $minGreen = 0;
            foreach (explode(";", $matches[2]) as $reveal) {
                foreach (explode(",", $reveal) as $cubeWithAmount) {
                    $cubeWithAmount = trim($cubeWithAmount);
                    [$amount, $color] = explode(' ', $cubeWithAmount);

                    if ($color === 'red') {
                        if ($amount > $minRed) {
                            $minRed = $amount;
                        }
                    } elseif ($color === 'blue') {
                        if ($amount > $minBlue) {
                            $minBlue = $amount;
                        }
                    } elseif ($color === 'green') {
                        if ($amount > $minGreen) {
                            $minGreen = $amount;
                        }
                    } else {
                        throw new RuntimeException('Nope');
                    }
                }
            }

            $result += ($minGreen * $minBlue * $minRed);
        }

        return (string) $result;
    }
}
