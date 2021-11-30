<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day8;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

class Day8 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2020, 8);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);

        $key = 0;
        $visitedKeys = [];
        $accumulator = 0;

        while (true) {
            if (in_array($key, $visitedKeys, true)) {
                break;
            }

            $visitedKeys[] = $key;
            $line = $lines[$key];

            [$operation, $argument] = explode(" ", $line);
            if ($operation === 'nop') {
                $key++;
                continue;
            }

            if ($operation === 'acc') {
                $accumulator += (int) $argument;
                $key++;
                continue;
            }

            if ($operation === 'jmp') {
                $key += (int) $argument;
                continue;
            }

            throw new RuntimeException('~> php start debugger');
        }

        return (string) $accumulator;
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);
        $accumulator = 0;

        foreach ($lines as $key => $line) {
            [$operation, $argument] = explode(" ", $line);
            $tmpLines = $lines;

            if ($operation === 'jmp') {
                $tmpLines[$key] = 'nop ' . $argument;
            } elseif ($operation === 'nop') {
                $tmpLines[$key] = 'jmp ' . $argument;
            } else {
                continue;
            }

            $accumulator = $this->codeRunner($tmpLines);

            if ($accumulator !== null) {
                break;
            }
        }

        return (string) $accumulator;
    }

    protected function codeRunner(array $lines): ?int
    {
        $key = 0;
        $visitedKeys = [];
        $accumulator = 0;

        while (true) {
            if (!array_key_exists($key, $lines)) {
                break;
            }

            if (in_array($key, $visitedKeys, true)) {
                return null;
            }

            $visitedKeys[] = $key;
            $line = $lines[$key];

            [$operation, $argument] = explode(" ", $line);
            if ($operation === 'nop') {
                $key++;
                continue;
            }

            if ($operation === 'acc') {
                $accumulator += (int) $argument;
                $key++;
                continue;
            }

            if ($operation === 'jmp') {
                $key += (int) $argument;
                continue;
            }

            throw new RuntimeException('~> php start debugger');
        }

        return $accumulator;
    }
}
