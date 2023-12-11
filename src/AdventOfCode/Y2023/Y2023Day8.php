<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_pop;
use function array_shift;
use function count;
use function explode;
use function gmp_lcm;
use function preg_match;
use function str_split;
use function substr;

class Y2023Day8 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2023, 8);
    }

    protected function partOne(string $input): string
    {
        [$rlInstructions, $network] = explode("\n\n", $input);
        $rlInstructions = str_split($rlInstructions);
        $network = explode("\n", $network);

        foreach ($network as $key => $line) {
            preg_match('/(.*) = \((.*), (.*)\)/', $line, $matches);

            $network[$matches[1] . 'L'] = $matches[2];
            $network[$matches[1] . 'R'] = $matches[3];
            unset($network[$key]);
        }

        $found = false;
        $tmpInstructions = $rlInstructions;
        $position = 'AAA';
        $steps = 0;

        while (!$found) {
            if (count($tmpInstructions) === 0) {
                $tmpInstructions = $rlInstructions;
            }

            $instruction = array_shift($tmpInstructions);

            $position = $network[$position . $instruction];
            $steps++;

            if ($position === 'ZZZ') {
                $found = true;
            }
        }

        return (string) $steps;
    }

    protected function partTwo(string $input): string
    {
        [$rlInstructions, $network] = explode("\n\n", $input);
        $rlInstructions = str_split($rlInstructions);
        $network = explode("\n", $network);

        $positions = [];
        foreach ($network as $key => $line) {
            preg_match('/(.*) = \((.*), (.*)\)/', $line, $matches);

            if (substr($matches[1], 2) === 'A') {
                $positions[] = $matches[1];
            }

            $network[$matches[1] . 'L'] = $matches[2];
            $network[$matches[1] . 'R'] = $matches[3];
            unset($network[$key]);
        }

        $positionSteps = [];
        foreach ($positions as $startPosition) {
            $found = false;
            $steps = 0;
            $tmpInstructions = $rlInstructions;
            $position = $startPosition;

            while (!$found) {
                if (count($tmpInstructions) === 0) {
                    $tmpInstructions = $rlInstructions;
                }

                $instruction = array_shift($tmpInstructions);
                $position = $network[$position . $instruction];

                if (substr($position, 2) === 'Z') {
                    $found = true;
                }

                $steps++;
            }

            $positionSteps[] = [
                $startPosition,
                $steps,
            ];
        }

        $res = 0;
        for ($i = 0; $i < count($positionSteps) - 1; $i++) {
            $positionSteps[$i + 1][1] = gmp_lcm($positionSteps[$i][1], $positionSteps[$i + 1][1]);
        }

        return (string) array_pop($positionSteps)[1];
    }
}
