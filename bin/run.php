<?php

declare(strict_types=1);

use XonneX\AdventOfCode\Core\AbstractSolution;

require __DIR__ . '/../vendor/autoload.php';

if ($argc === 1) {
    $day = date('d');
    $year = date('Y');
} elseif ($argc === 2) {
    $day = $argv[1];
    $year = date('Y');
} elseif ($argc === 3) {
    $day = $argv[1];
    $year = $argv[2];
} else {
    printUsage();
    die();
}

if (array_key_exists(1, $argv)) {
    $day = $argv[1];
    printDay((int) $year, (int) $day);

    printYears(false);
} else {
    printYears();
}

function printUsage(): void
{
    echo <<<TXT
Usage:
    run.php                 Uses current day and year (only works for day 1-24)
    run.php [day]           Uses current year
    run.php [day] [year]
TXT;
}

function printDay(int $year, int $day, bool $output = true): array
{
    $class = sprintf('XonneX\\AdventOfCode\\Y%s\\Solutions\\Day%s\\Day%s', $year, $day, $day);

    if ($output) {
        echo sprintf('--- Year %s Day %s ---', $year, $day) . PHP_EOL;
    }

    if (!class_exists($class)) {
        if ($output) {
            echo 'Skipped day because class does not exist' . PHP_EOL;
        }

        return [
            'day' => $day,
            'php_source' => "[Day{$day}.php](src/AdventOfCode/Y{$year}/Solutions/Day{$day}/Day{$day}.php)",
            'php_unit_test' => "[Day{$day}Test.php](tests/AdventOfCode/Y{$year}/Solutions/Day{$day}/Day{$day}Test.php)",
            'input' => "[input.txt](inputs/{$year}/day{$day}/input.txt)",
        ];
    }

    try {
        /** @var AbstractSolution $instance */
        $instance = new $class();
    } catch (RuntimeException $e) {
        if ($output) {
            echo 'Skipped day because "' . $e->getMessage() . '"' . PHP_EOL;
        }

        return [
            'day' => $day,
            'php_source' => "[Day{$day}.php](src/AdventOfCode/Y{$year}/Solutions/Day{$day}/Day{$day}.php)",
            'php_unit_test' => "[Day{$day}Test.php](tests/AdventOfCode/Y{$year}/Solutions/Day{$day}/Day{$day}Test.php)",
            'input' => "[input.txt](inputs/{$year}/day{$day}/input.txt)",
        ];
    }

    try {
        $partOneSolution = $instance->solvePartOne();

        if ($output) {
            echo 'Part 1: ' . $partOneSolution . PHP_EOL;
        }
    } catch (RuntimeException $e) {
        $partOneSolution = 'Skipped part 1 because "' . $e->getMessage() . '"';

        if ($output) {
            echo $partOneSolution . PHP_EOL;
        }
    }

    try {
        $partTwoSolution = $instance->solvePartTwo();

        if ($output) {
            echo 'Part 2: ' . $instance->solvePartTwo() . PHP_EOL;
        }
    } catch (RuntimeException $e) {
        $partTwoSolution = 'Skipped part 2 because "' . $e->getMessage() . '"';

        if ($output) {
            echo $partTwoSolution . PHP_EOL;
        }
    }

    return [
        'day' => $day,
        'part_one_solution' => $partOneSolution,
        'part_two_solution' => $partTwoSolution,
        'php_source' => "[Day{$day}.php](src/AdventOfCode/Y{$year}/Solutions/Day{$day}/Day{$day}.php)",
        'php_unit_test' => "[Day{$day}Test.php](tests/AdventOfCode/Y{$year}/Solutions/Day{$day}/Day{$day}Test.php)",
        'input' => "[input.txt](inputs/{$year}/day{$day}/input.txt)",
    ];
}

function printDays(int $year, bool $output = true): string
{
    $informationArray = [];

    foreach (range(1, 24) as $day) {
        $informationArray[] = printDay($year, (int) $day, $output);
    }

    $content = '';

    foreach ($informationArray as $information) {
        $content .= '| ' . $information['day'] . ' ';
        $content .= '| ' . $information['part_one_solution'] ?? '-' . ' ';
        $content .= '| ' . $information['part_two_solution'] ?? '-' . ' ';
        $content .= '| ' . $information['php_source'] . ' ';
        $content .= '| ' . $information['php_unit_test'] . ' ';
        $content .= '| ' . $information['input'] . ' |';
        $content .= "\n";
    }

    return $content;
}

function printYears(bool $output = true): void
{
    $content = '';

    foreach (getYears() as $year) {
        $content .= <<<MARKDOWN

## YEAR {$year}

| Day | Part One Solution | Part Two Solution | PHP Source | PHP Unit Test | Input |
|---|---|---|---|---|---|

MARKDOWN;

        $content .= printDays($year, $output);
    }

    file_put_contents(
        __DIR__ . '/../SOLUTIONS.md',
        <<<MARKDOWN
# Solutions
{$content}
MARKDOWN
    );
}

/**
 * @return int[]
 */
function getYears(): array
{
    $directories = scandir(__DIR__ . '/../src/AdventOfCode');
    $directories = array_diff($directories, ['.', '..', 'Core']);

    $years = [];
    foreach ($directories as $directory) {
        $years[] = (int) substr($directory, 1);
    }

    return $years;
}
