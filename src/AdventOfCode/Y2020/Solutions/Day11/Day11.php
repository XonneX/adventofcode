<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day11;

use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_key_exists;
use function count;
use function explode;
use function str_split;

class Day11 extends AbstractSolution
{
    private const EMPTY_SEAT = 'L';
    private const FLOOR = '.';
    private const OCCUPIED_SEAT = '#';

    public function __construct()
    {
        parent::__construct(2020, 11);
    }

    // TODO: Performance rewrite low priority
    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);
        $map   = [];

        foreach ($lines as $y => $line) {
            $map[$y] = str_split($line);
        }

        do {
            $changedMap = $map;
            $hasChanges = false;

            $maxY = count($map);
            $maxX = count($map[0]);
            for ($y = 0; $y < $maxY; $y++) {
                for ($x = 0; $x < $maxX; $x++) {
                    $state = $map[$y][$x];

                    if (
                        $state === self::EMPTY_SEAT
                        && $this->countAdjacentSeats($y, $x, $map, self::OCCUPIED_SEAT, false) === 0
                    ) {
                        $hasChanges         = true;
                        $changedMap[$y][$x] = self::OCCUPIED_SEAT;
                    } elseif (
                        $state === self::OCCUPIED_SEAT
                        && $this->countAdjacentSeats($y, $x, $map, self::OCCUPIED_SEAT, false) >= 4
                    ) {
                        $hasChanges         = true;
                        $changedMap[$y][$x] = self::EMPTY_SEAT;
                    }
                }
            }

            $map = $changedMap;
        } while ($hasChanges);

        $counter = 0;
        foreach ($map as $rows) {
            foreach ($rows as $value) {
                if ($value === self::OCCUPIED_SEAT) {
                    $counter++;
                }
            }
        }

        return (string) $counter;
    }

    // TODO: Performance rewrite medium priority
    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);
        $map   = [];

        foreach ($lines as $y => $line) {
            $map[$y] = str_split($line);
        }

        do {
            $changedMap = $map;
            $hasChanges = false;

            $maxY = count($map);
            $maxX = count($map[0]);
            for ($y = 0; $y < $maxY; $y++) {
                for ($x = 0; $x < $maxX; $x++) {
                    $state = $map[$y][$x];

                    if (
                        $state === self::EMPTY_SEAT
                        && $this->countAdjacentSeats($y, $x, $map, self::OCCUPIED_SEAT, true) === 0
                    ) {
                        $hasChanges         = true;
                        $changedMap[$y][$x] = self::OCCUPIED_SEAT;
                    }

                    if (
                        $state === self::OCCUPIED_SEAT
                        && $this->countAdjacentSeats($y, $x, $map, self::OCCUPIED_SEAT, true) >= 5
                    ) {
                        $hasChanges         = true;
                        $changedMap[$y][$x] = self::EMPTY_SEAT;
                    }
                }
            }

            $map = $changedMap;
        } while ($hasChanges);

        $counter = 0;
        foreach ($map as $rows) {
            foreach ($rows as $value) {
                if ($value === self::OCCUPIED_SEAT) {
                    $counter++;
                }
            }
        }

        return (string) $counter;
    }

    private function countAdjacentSeats(int $baseY, int $baseX, array $map, string $searchType, bool $infinite): int
    {
        $counter = 0;

        // LEFT
        $x = $baseX;
        while (true) {
            $x--;
            if (!array_key_exists($x, $map[$baseY])) {
                break;
            }

            $val = $map[$baseY][$x];

            if ($val === self::FLOOR) {
                if ($infinite) {
                    continue;
                }

                break;
            }

            if ($val === $searchType) {
                $counter++;
            }

            break;
        }

        // RIGHT
        $x = $baseX;
        while (true) {
            $x++;

            if (!array_key_exists($x, $map[$baseY])) {
                break;
            }

            $val = $map[$baseY][$x];

            if ($val === self::FLOOR) {
                if ($infinite) {
                    continue;
                }

                break;
            }

            if ($val === $searchType) {
                $counter++;
            }

            break;
        }

        // TOP
        $y = $baseY;
        while (true) {
            $y--;
            if (!array_key_exists($y, $map)) {
                break;
            }

            $val = $map[$y][$baseX];

            if ($val === self::FLOOR) {
                if ($infinite) {
                    continue;
                }

                break;
            }

            if ($val === $searchType) {
                $counter++;
            }

            break;
        }

        // BOTTOM
        $y = $baseY;
        while (true) {
            $y++;

            if (!array_key_exists($y, $map)) {
                break;
            }

            $val = $map[$y][$baseX];

            if ($val === self::FLOOR) {
                if ($infinite) {
                    continue;
                }

                break;
            }

            if ($val === $searchType) {
                $counter++;
            }

            break;
        }

        // TOP - LEFT
        $y = $baseY;
        $x = $baseX;
        while (true) {
            $y--;
            $x--;

            if (!array_key_exists($y, $map) || !array_key_exists($x, $map[$y])) {
                break;
            }

            $val = $map[$y][$x];

            if ($val === self::FLOOR) {
                if ($infinite) {
                    continue;
                }

                break;
            }

            if ($val === $searchType) {
                $counter++;
            }

            break;
        }

        // TOP - RIGHT
        $y = $baseY;
        $x = $baseX;
        while (true) {
            $y--;
            $x++;

            if (!array_key_exists($y, $map) || !array_key_exists($x, $map[$y])) {
                break;
            }

            $val = $map[$y][$x];

            if ($val === self::FLOOR) {
                if ($infinite) {
                    continue;
                }

                break;
            }

            if ($val === $searchType) {
                $counter++;
            }

            break;
        }

        // BOTTOM - LEFT
        $y = $baseY;
        $x = $baseX;
        while (true) {
            $y++;
            $x--;

            if (!array_key_exists($y, $map) || !array_key_exists($x, $map[$y])) {
                break;
            }

            $val = $map[$y][$x];

            if ($val === self::FLOOR) {
                if ($infinite) {
                    continue;
                }

                break;
            }

            if ($val === $searchType) {
                $counter++;
            }

            break;
        }

        // BOTTOM - RIGHT
        $y = $baseY;
        $x = $baseX;
        while (true) {
            $y++;
            $x++;

            if (!array_key_exists($y, $map) || !array_key_exists($x, $map[$y])) {
                break;
            }

            $val = $map[$y][$x];

            if ($val === self::FLOOR) {
                if ($infinite) {
                    continue;
                }

                break;
            }

            if ($val === $searchType) {
                $counter++;
            }

            break;
        }

        return $counter;
    }
}
