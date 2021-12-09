<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day9;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_map;
use function array_merge;
use function array_shift;
use function array_sum;
use function array_unique;
use function arsort;
use function count;
use function explode;
use function print_r;
use function str_split;
use function var_dump;

class Day9 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 9);
    }

    protected function partOne(string $input): string
    {
        $points = [];

        foreach (explode("\n", $input) as $x => $line) {
            foreach (str_split($line) as $y => $height) {
                $point = new Point();
                $point->x = $x;
                $point->y = $y;
                $point->height = (int) $height;
                $points[$x . '_' . $y] = $point;
            }
        }

        $lowPoints = [];
        foreach ($points as $point) {
            $top = $points[($point->x - 1) . '_' . $point->y] ?? null;
            $bottom = $points[($point->x + 1) . '_' . $point->y] ?? null;
            $left = $points[$point->x . '_' . ($point->y - 1)] ?? null;
            $right = $points[$point->x . '_' . ($point->y + 1)] ?? null;

            if (
                ($top === null || $top->height > $point->height)
                && ($bottom === null || $bottom->height > $point->height)
                && ($left === null || $left->height > $point->height)
                && ($right === null || $right->height > $point->height)
            ) {
                $lowPoints[] = $point;
            }
        }

        return (string) array_sum(array_map(static fn(Point $point) => $point->height + 1, $lowPoints));
    }

    protected function partTwo(string $input): string
    {
        $points = [];

        foreach (explode("\n", $input) as $x => $line) {
            foreach (str_split($line) as $y => $height) {
                $point = new Point();
                $point->x = $x;
                $point->y = $y;
                $point->height = (int) $height;
                $points[$x . '_' . $y] = $point;
            }
        }

        $lowPoints = [];
        foreach ($points as $point) {
            $top = $points[($point->x - 1) . '_' . $point->y] ?? null;
            $bottom = $points[($point->x + 1) . '_' . $point->y] ?? null;
            $left = $points[$point->x . '_' . ($point->y - 1)] ?? null;
            $right = $points[$point->x . '_' . ($point->y + 1)] ?? null;

            if (
                ($top === null || $top->height > $point->height)
                && ($bottom === null || $bottom->height > $point->height)
                && ($left === null || $left->height > $point->height)
                && ($right === null || $right->height > $point->height)
            ) {
                $lowPoints[] = $point;
            }
        }

        $counts = [];

        array_shift($lowPoints);
        foreach ($lowPoints as $point) {
            $adjacent = $this->findAdjacent($points, $point);

            $adjacent = array_unique($adjacent, SORT_REGULAR);

            $counts[] = count($adjacent) + 1;
        }

        rsort($counts);

        return (string) (array_shift($counts) * array_shift($counts) * array_shift($counts));
    }

    /**
     * @return Point[]
     */
    private function findAdjacent(array $points, Point $point): array
    {
        $top = $points[($point->x - 1) . '_' . $point->y] ?? null;
        $bottom = $points[($point->x + 1) . '_' . $point->y] ?? null;
        $left = $points[$point->x . '_' . ($point->y - 1)] ?? null;
        $right = $points[$point->x . '_' . ($point->y + 1)] ?? null;

        $adjacent = [];

        if ($top !== null && $top->height !== 9 && $top->height > $point->height) {
            $adjacent[] = $top;
        }

        if ($bottom !== null && $bottom->height !== 9 && $bottom->height > $point->height) {
            $adjacent[] = $bottom;
        }

        if ($left !== null && $left->height !== 9 && $left->height > $point->height) {
            $adjacent[] = $left;
        }

        if ($right !== null && $right->height !== 9 && $right->height > $point->height) {
            $adjacent[] = $right;
        }

        foreach ($adjacent as $value) {
            /** @noinspection SlowArrayOperationsInLoopInspection */
            $adjacent = array_merge($adjacent, $this->findAdjacent($points, $value));
        }

        return $adjacent;
    }
}
