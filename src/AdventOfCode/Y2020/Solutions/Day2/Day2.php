<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day2;

use XonneX\AdventOfCode\Core\AbstractSolution;

class Day2 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2020, 2);
    }

    protected function partOne(string $input): string
    {
        $lines                = explode("\n", $input);
        $validPasswordCounter = 0;

        foreach ($lines as $line) {
            preg_match('/(\d*)-(\d*) (\w): (\w*)/', $line, $matches);

            [1 => $minOccurrences, 2 => $maxOccurrences, 3 => $letter, 4 => $subject] = $matches;

            $occurrences = substr_count($subject, $letter);

            if ($occurrences >= (int) $minOccurrences && $occurrences <= (int) $maxOccurrences) {
                $validPasswordCounter++;
            }
        }

        return (string) $validPasswordCounter;
    }

    // TODO: Performance rewrite low priority
    protected function partTwo(string $input): string
    {
        $lines                = explode("\n", $input);
        $validPasswordCounter = 0;

        foreach ($lines as $line) {
            preg_match('/(\d*)-(\d*) (\w): (\w*)/', $line, $matches);

            [1 => $positionOne, 2 => $positionTwo, 3 => $letter, 4 => $subject] = $matches;

            $letterPositionOne = substr($subject, (int) $positionOne - 1, 1);
            $letterPositionTwo = substr($subject, (int) $positionTwo - 1, 1);

            if ($letterPositionOne === $letter && $letterPositionTwo === $letter) {
                continue;
            }

            if ($letterPositionOne === $letter || $letterPositionTwo === $letter) {
                $validPasswordCounter++;
            }
        }

        return (string) $validPasswordCounter;
    }
}
