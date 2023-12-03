<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Core\Run;

use Throwable;
use XonneX\AdventOfCode\Core\AbstractSolution;
use XonneX\AdventOfCode\Core\Exceptions\ClassInstantiationException;
use XonneX\AdventOfCode\Core\Exceptions\ClassNotFoundException;

use function class_exists;
use function microtime;

class Runner
{
    /**
     * @return SolutionResult[]
     * @throws ClassNotFoundException
     * @throws ClassInstantiationException
     */
    public function run(int $year, int $day): array
    {
        $class = sprintf('XonneX\\AdventOfCode\\Y%s\\Y%sDay%s', $year, $year, $day);

        if (!class_exists($class)) {
            throw new ClassNotFoundException();
        }

        try {
            $instance = new $class();
            assert($instance instanceof AbstractSolution);
        } catch (Throwable $throwable) {
            throw new ClassInstantiationException(previous: $throwable);
        }

        $solutionPart1 = new SolutionResult($year, $day, 1);

        try {
            $st = (int) (microtime(true) * 1000);
            $solutionPart1->setSolution($instance->solvePartOne());
            $et = (int) (microtime(true) * 1000);
            $solutionPart1->setTime($et - $st);
        } catch (Throwable $throwable) {
            $solutionPart1->setThrowable($throwable);
        }

        $solutionPart2 = new SolutionResult($year, $day, 2);

        try {
            $st = (int) (microtime(true) * 1000);
            $solutionPart2->setSolution($instance->solvePartTwo());
            $et = (int) (microtime(true) * 1000);
            $solutionPart2->setTime($et - $st);
        } catch (Throwable $throwable) {
            $solutionPart2->setThrowable($throwable);
        }

        return [$solutionPart1, $solutionPart2];
    }
}
