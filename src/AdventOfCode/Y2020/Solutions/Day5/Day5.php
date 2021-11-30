<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day5;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

class Day5 extends AbstractSolution
{
    private const FRONT = 'F';
    private const BACK = 'B';
    private const LEFT = 'L';
    private const RIGHT = 'R';

    public function __construct()
    {
        parent::__construct(2020, 5);
    }

    protected function partOne(string $input): string
    {
        $instructionLines = explode("\n", $input);

        $highestSeatId = 0;

        foreach ($instructionLines as $instructionLine) {
            $seatId = $this->calculateSeatId($instructionLine);

            if ($seatId > $highestSeatId) {
                $highestSeatId = $seatId;
            }
        }

        return (string)$highestSeatId;
    }

    public function calculateSeatId(string $instructionLine): int
    {
        $rowsStart = 0;
        $rowsEnd = 127;
        $rowInstructions = str_split(substr($instructionLine, 0, 7));

        foreach ($rowInstructions as $instruction) {
            $middle = ($rowsEnd - $rowsStart + 1) / 2;

            if ($instruction === self::FRONT) {
                $rowsEnd -= $middle;
            } elseif ($instruction === self::BACK) {
                $rowsStart += $middle;
            } else {
                throw new RuntimeException('Well, shit...');
            }
        }

        $columnsStart = 0;
        $columnsEnd = 7;
        $columnInstructions = str_split(substr($instructionLine, 7, 3));

        foreach ($columnInstructions as $instruction) {
            $middle = ($columnsEnd - $columnsStart + 1) / 2;

            if ($instruction === self::LEFT) {
                $columnsEnd -= $middle;
            } elseif ($instruction === self::RIGHT) {
                $columnsStart += $middle;
            } else {
                throw new RuntimeException('Well, shit...');
            }
        }

        return $rowsEnd * 8 + $columnsEnd;
    }

    protected function partTwo(string $input): string
    {
        $instructionLines = explode("\n", $input);

        $seatIds = [];

        foreach ($instructionLines as $instructionLine) {
            $seatIds[] = $this->calculateSeatId($instructionLine);
        }

        sort($seatIds);

        $minValue = array_shift($seatIds);
        $maxValue = array_pop($seatIds);

        $missingSeatIds = range($minValue, $maxValue);

        foreach ($seatIds as $missingSeatId) {
            unset($missingSeatIds[array_search($missingSeatId, $missingSeatIds, true)]);
        }

        foreach ($missingSeatIds as $missingSeatId) {
            if (
                in_array($missingSeatId + 1, $seatIds, true)
                && in_array($missingSeatId - 1, $seatIds, true)
            ) {
                return (string)$missingSeatId;
            }
        }

        throw new RuntimeException('Well, shit...');
    }
}
