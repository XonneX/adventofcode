<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day12;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_count_values;
use function array_search;
use function array_unique;
use function array_values;
use function count;
use function ctype_lower;
use function ctype_upper;
use function explode;
use function in_array;
use function print_r;
use function rsort;
use function sort;
use function sprintf;
use function str_contains;

use function str_split;
use function var_dump;

use const PHP_EOL;

class Day12 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 12);
    }

    protected function partOne(string $input): string
    {
        $map = [];
        foreach (explode("\n", $input) as $line) {
            [$start, $adjacent] = explode('-', $line);

            if ($start !== 'end' && $adjacent !== 'start') {
                $map[$start][] = $adjacent;
            }

            if ($start !== 'start' && $adjacent !== 'end') {
                $map[$adjacent][] = $start;
            }
        }
        $paths = $this->generatePaths('start', $map['start'], $map);

        return (string) count($paths);
    }

    protected function partTwo(string $input): string
    {
        $map = [];
        foreach (explode("\n", $input) as $line) {
            [$start, $adjacent] = explode('-', $line);

            if ($start !== 'end' && $adjacent !== 'start') {
                $map[$start][] = $adjacent;
            }

            if ($start !== 'start' && $adjacent !== 'end') {
                $map[$adjacent][] = $start;
            }
        }

        $paths = $this->generatePathsTwo('start', $map['start'], $map);

        return (string) count($paths);
    }

    private function generatePaths(string $path, array $siblings, array $map): array
    {
        $paths = [];

        foreach ($siblings as $sibling) {
            $newPath = $path . ',' . $sibling;

            if ($sibling === 'end') {
                $paths[] = $newPath;
                continue;
            }

            if (ctype_lower($sibling) && str_contains($path, ',' . $sibling)) {
                continue;
            }

            foreach ($this->generatePaths($newPath, $map[$sibling], $map) as $value) {
                $paths[] = $value;
            }
        }

        return $paths;
    }

    private function generatePathsTwo(string $path, array $siblings, array $map): array
    {
        $paths = [];

        foreach ($siblings as $sibling) {
            $newPath = $path . ',' . $sibling;

            if ($sibling === 'end') {
                $paths[] = $newPath;
                continue;
            }

            if (ctype_lower($sibling) && (str_contains($path, ',' . $sibling) && !$this->checkSmallCaveAgain($path))) {
                continue;
            }

            foreach ($this->generatePathsTwo($newPath, $map[$sibling], $map) as $value) {
                $paths[] = $value;
            }
        }

        return $paths;
    }

    private function checkSmallCaveAgain(string $path): bool
    {
        $counts = array_count_values(explode(',', $path));

        foreach ($counts as $char => $count) {
            if ($char === 'start' || ctype_upper($char)) {
                continue;
            }

            if ($count > 1) {
                return false;
            }
        }

        return true;
    }
}
