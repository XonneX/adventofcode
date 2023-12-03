<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Core\Run;

use Throwable;

class SolutionResult
{
    private const int SOlVED = 0;
    private const int EXCEPTION = 1;
    private const int UNSOLVED = 2;
    private int $state = self::UNSOLVED;
    private string $solution;
    private Throwable $throwable;
    private int $year;
    private int $day;

    private int $part;

    private int $time;

    public function __construct(int $year, int $day, int $part)
    {
        $this->year = $year;
        $this->day = $day;
        $this->part = $part;
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

    public function getPart(): int
    {
        return $this->part;
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function setTime(int $time): void
    {
        $this->time = $time;
    }
}
