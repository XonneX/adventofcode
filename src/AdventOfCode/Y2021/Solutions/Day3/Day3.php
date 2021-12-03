<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day3;

use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_pop;
use function array_values;
use function bindec;
use function count;
use function explode;
use function str_split;
use function strlen;
use function substr_count;

class Day3 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 3);
    }

    protected function partOne(string $input): string
    {
        $numbers = explode("\n", $input);
        $columnNumbers = [];
        $columnCount = strlen($numbers[0]);

        for ($i = 0; $i < $columnCount; $i++) {
            $columnNumbers[$i] = '';
        }

        foreach ($numbers as $number) {
            $bits = str_split($number);

            foreach ($bits as $key => $bit) {
                $columnNumbers[$key] .= $bit;
            }
        }

        $gammaRate = '';
        $epsilonRate = '';
        foreach ($columnNumbers as $columnNumber) {
            $zeros = substr_count($columnNumber, '0');
            $ones = substr_count($columnNumber, '1');

            if ($zeros > $ones) {
                $gammaRate .= '0';
                $epsilonRate .= '1';
            } else {
                $gammaRate .= '1';
                $epsilonRate .= '0';
            }
        }

        return (string) (bindec($gammaRate) * bindec($epsilonRate));
    }

    protected function partTwo(string $input): string
    {
        $numbers = explode("\n", $input);

        $oxygenRatingNumbers = array_values($numbers);
        $i = 0;
        while (count($oxygenRatingNumbers) > 1) {
            $columnNumber = $this->getColumnNumber($oxygenRatingNumbers, $i);
            $zeros = substr_count($columnNumber, '0');
            $ones = substr_count($columnNumber, '1');

            foreach ($oxygenRatingNumbers as $oxygenKey => $oxygenRatingNumber) {
                $bit = str_split($oxygenRatingNumber)[$i];

                if ($zeros > $ones && $bit === '1') {
                    unset($oxygenRatingNumbers[$oxygenKey]);
                } elseif (($zeros < $ones || $zeros === $ones) && $bit === '0') {
                    unset($oxygenRatingNumbers[$oxygenKey]);
                }
            }

            $i++;
        }
        $oxygenRating = bindec(array_pop($oxygenRatingNumbers));

        $co2RatingNumbers = array_values($numbers);
        $i = 0;
        while (count($co2RatingNumbers) > 1) {
            $columnNumber = $this->getColumnNumber($co2RatingNumbers, $i);
            $zeros = substr_count($columnNumber, '0');
            $ones = substr_count($columnNumber, '1');

            foreach ($co2RatingNumbers as $oxygenKey => $oxygenRatingNumber) {
                $bit = str_split($oxygenRatingNumber)[$i];

                if (($zeros < $ones || $zeros === $ones) && $bit === '1') {
                    unset($co2RatingNumbers[$oxygenKey]);
                } elseif ($zeros > $ones && $bit === '0') {
                    unset($co2RatingNumbers[$oxygenKey]);
                }
            }

            $i++;
        }
        $co2Rating = bindec(array_pop($co2RatingNumbers));

        return (string) ($oxygenRating * $co2Rating);
    }

    private function getColumnNumber(array $numbers, int $column): string
    {
        $columnNumber = '';

        foreach ($numbers as $number) {
            $bits = str_split($number);

            $columnNumber .= $bits[$column];
        }

        return $columnNumber;
    }
}
