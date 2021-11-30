<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day9;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

class Day9 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2020, 9);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        return $this->findNotMatchingNumber(25, $lines);
    }

    /**
     * @param non-empty-list<string> $lines
     */
    public function findNotMatchingNumber(int $preambleSize, array $lines): string
    {
        $key = $preambleSize;

        while (true) {
            $checkKeys = range($key - $preambleSize, $key - 1);


            $tmpNumbers = [];
            foreach ($checkKeys as $checkKey) {
                $tmpNumbers[] = (int) $lines[$checkKey];
            }

            $tmpSums = [];
            foreach ($tmpNumbers as $tmpNumber) {
                foreach ($tmpNumbers as $tmpNumber2) {
                    if ($tmpNumber === $tmpNumber2) {
                        continue;
                    }

                    $tmpSums[] = $tmpNumber + $tmpNumber2;
                }
            }

            $sum = (int) $lines[$key];

            if (!in_array($sum, $tmpSums, true)) {
                return (string) $sum;
            }

            $key++;
        }
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);

        return $this->findSumOfNotMatchingNumber(25, $lines);
    }

    /**
     * @param non-empty-list<string> $lines
     */
    public function findSumOfNotMatchingNumber(int $preambleSize, array $lines): string
    {
        $notMatchingNumber = (int) $this->findNotMatchingNumber($preambleSize, $lines);

        $numbers = [];
        $sum     = 0;
        foreach ($lines as $key => $line) {
            $i = $key;
            while (true) {
                $number = (int) $lines[$i];

                if (($sum + $number) === $notMatchingNumber) {
                    sort($numbers);

                    $number1 = array_shift($numbers);
                    $number2 = array_pop($numbers);

                    return (string) ($number1 + $number2);
                }

                if ($sum > $notMatchingNumber) {
                    $numbers = [];
                    $sum     = 0;
                    break;
                }

                $i++;
                $sum       += $number;
                $numbers[] = $number;
            }
        }

        throw new RuntimeException('Oh no');
    }
}
