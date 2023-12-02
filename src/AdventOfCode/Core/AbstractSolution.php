<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Core;

use RuntimeException;

abstract class AbstractSolution
{
    private ?string $debugInput = null;
    private string $input;

    public function __construct(private int $year, private int $day) {
        $filePath = __DIR__ . sprintf('/../../../inputs/%s/day%s.txt', $this->year, $this->day);

        if (!is_readable($filePath)) {
            throw new RuntimeException(sprintf('Input file not readable: %s', $filePath));
        }

        $this->input = file_get_contents($filePath);
    }

    public function setDebugInput(string $debugInput): void
    {
        $this->debugInput = $debugInput;
    }

    private function getInput(): string
    {
        return $this->debugInput ?? $this->input;
    }

    public function solvePartOne(): string
    {
        return $this->partOne($this->getInput());
    }

    public function solvePartTwo(): string
    {
        return $this->partTwo($this->getInput());
    }

    abstract protected function partOne(string $input): string;

    abstract protected function partTwo(string $input): string;
}
