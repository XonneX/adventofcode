<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Core\Run;

use Throwable;

class SolutionPartResult
{
    private const SOlVED = 0;
    private const EXCEPTION = 1;
    private const UNSOLVED = 2;
    private int $state = self::UNSOLVED;
    private string $solution;
    private Throwable $throwable;
    private int $year;
    private int $day;

    public function __construct(int $year, int $day)
    {
        $this->year = $year;
        $this->day = $day;
    }

    public function getSolution(): string
    {
        return $this->solution;
    }

    public function setSolution(string $solution): void
    {
        $this->state = self::SOlVED;
        $this->solution = $solution;
    }
    public function getThrowable(): Throwable
    {
        return $this->throwable;
    }

    public function setThrowable(Throwable $throwable): void
    {
        $this->state = self::EXCEPTION;
        $this->throwable = $throwable;
    }

    public function isSolved(): bool
    {
        return $this->state === self::SOlVED;
    }


    public function isError(): bool
    {
        return $this->state === self::EXCEPTION;
    }

    public function isUnsolved(): bool
    {
        return $this->state === self::UNSOLVED;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getDay(): int
    {
        return $this->day;
    }
}
