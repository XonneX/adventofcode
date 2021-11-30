<?php

$year = $argv[1] ?? date('Y');
$overwrite = $argv[2] ?? '0';

if (!is_string($year) || strlen($year) !== 4) {
    echo 'Invalid year ' . $year . PHP_EOL;
    die();
}

if (!in_array($overwrite, ['1', '0'], true)) {
    echo 'Invalid overwrite param' . PHP_EOL;
    die();
}

$overwrite = (bool) $overwrite;

$solutionTemplate = <<<'PHP'
<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y{{ YEAR }}\Solutions\Day{{ DAY }};

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

class Day{{ DAY }} extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2020, {{ DAY }});
    } 

    protected function partOne(string $input): string
    {
        throw new RuntimeException('Not implemented yet');
    }

    protected function partTwo(string $input): string
    {
        throw new RuntimeException('Not implemented yet');
    }
}

PHP;

$testTemplate = <<<'PHP'
<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y{{ YEAR }}\Solutions\Day{{ DAY }};

use PHPUnit\Framework\TestCase;

class Day{{ DAY }}Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day{{ DAY }} = new Day{{ DAY }}();

        $day{{ DAY }}->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day{{ DAY }}->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day{{ DAY }} = new Day{{ DAY }}();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day{{ DAY }}->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day{{ DAY }} = new Day{{ DAY }}();

        $day{{ DAY }}->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day{{ DAY }}->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day{{ DAY }} = new Day{{ DAY }}();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day{{ DAY }}->solvePartTwo());
    }
}

PHP;

$days = range(1, 24);

foreach ($days as $day) {
    $inputDirectory = sprintf('%s/../inputs/%s/day%s', __DIR__, $year, $day);
    $inputFile = $inputDirectory . '/input.txt';

    $solutionDirectory = sprintf('%s/../src/AdventOfCode/Y%s/Solutions/Day%s', __DIR__, $year, $day);
    $solutionFile = sprintf('%s/Day%s.php', $solutionDirectory, $day);

    $testDirectory = sprintf('%s/../tests/AdventOfCode/Y%s/Solutions/Day%s', __DIR__, $year, $day);
    $testFile = sprintf('%s/Day%sTest.php', $testDirectory, $day);

    if (!is_dir($inputDirectory) && !mkdir($inputDirectory, recursive: true) && !is_dir($inputDirectory)) {
        throw new RuntimeException(sprintf('Directory "%s" was not created', $inputDirectory));
    }

    if (file_exists($inputFile)) {
        if ($overwrite) {
            unlink($inputFile);
            touch($inputFile);
        }
    } else {
        touch($inputFile);
    }

    $solution = str_replace(
        ['{{ YEAR }}', '{{ DAY }}'],
        [$year, $day],
        $solutionTemplate
    );

    if (!is_dir($solutionDirectory) && !mkdir($solutionDirectory, recursive: true) && !is_dir($solutionDirectory)) {
        throw new RuntimeException(sprintf('Directory "%s" was not created', $solutionDirectory));
    }

    if (file_exists($solutionFile)) {
        if ($overwrite) {
            file_put_contents($solutionFile, $solution);
        }
    } else {
        file_put_contents($solutionFile, $solution);
    }

    $test = str_replace(
        ['{{ YEAR }}', '{{ DAY }}'],
        [$year, $day],
        $testTemplate
    );

    if (!is_dir($testDirectory) && !mkdir($testDirectory, recursive: true) && !is_dir($testDirectory)) {
        throw new RuntimeException(sprintf('Directory "%s" was not created', $testDirectory));
    }

    if (file_exists($testFile)) {
        if ($overwrite) {
            file_put_contents($testFile, $test);
        }
    } else {
        file_put_contents($testFile, $test);
    }
}
