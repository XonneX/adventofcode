<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Core\Run;

use Throwable;
use XonneX\AdventOfCode\Core\AbstractSolution;
use XonneX\AdventOfCode\Core\Exceptions\ClassInstantiationException;
use XonneX\AdventOfCode\Core\Exceptions\ClassNotFoundException;

use function class_exists;

class Runner
{
    /**
     * @throws ClassNotFoundException
     * @throws ClassInstantiationException
     */
    public function run(int $year, int $day): SolutionResult
    {
        $class = sprintf('XonneX\\AdventOfCode\\Y%s\\Y%sDay%s', $year, ($year - 2000), $day);

        if (!class_exists($class)) {
            throw new ClassNotFoundException();
        }

        try {
            $instance = new $class();
            assert($instance instanceof AbstractSolution);
        } catch (Throwable $throwable) {
            throw new ClassInstantiationException(previous: $throwable);
        }

        $solution = new SolutionResult();

        try {
            $solution->getPartOne()->setSolution($instance->solvePartOne());
        } catch (Throwable $throwable) {
            $solution->getPartOne()->setThrowable($throwable);
        }

        try {
            $solution->getPartTwo()->setSolution($instance->solvePartTwo());
        } catch (Throwable $throwable) {
            $solution->getPartTwo()->setThrowable($throwable);
        }

        return $solution;
    }
}
