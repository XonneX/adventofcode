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

namespace XonneX\AdventOfCode\Y{{ YEAR }};

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

class Y{{ YEAR }}Day{{ DAY }} extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct({{ YEAR }}, {{ DAY }});
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

namespace XonneX\AdventOfCode\Y{{ YEAR }};

use PHPUnit\Framework\TestCase;

class Y{{ YEAR }}Day{{ DAY }}Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day = new Y{{ YEAR }}Day{{ DAY }}();

        $day->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day->solvePartOne());
    }

    public function testSolvePartOne(): void
    {
        $day = new Y{{ YEAR }}Day{{ DAY }}();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day->solvePartOne());
    }

    public function testSolvePartTwoExample(): void
    {
        $day = new Y{{ YEAR }}Day{{ DAY }}();

        $day->setDebugInput(<<<TXT
NO_EXAMPLE_INITIALIZED
TXT
        );

        self::assertSame('NO_SOLUTION_INITIALIZED', $day->solvePartTwo());
    }

    public function testSolvePartTwo(): void
    {
        $day = new Y{{ YEAR }}Day{{ DAY }}();

        self::assertSame('NO_SOLUTION_INITIALIZED', $day->solvePartTwo());
    }
}

PHP;

$days = range(1, 24);

foreach ($days as $day) {
    $inputDirectory = sprintf('%s/../inputs/%s', __DIR__, $year);
    $inputFile = $inputDirectory . sprintf('/day%s.txt', $day);

    $solutionDirectory = sprintf('%s/../src/AdventOfCode/Y%s', __DIR__, $year);
    $solutionFile = sprintf('%s/Y%sDay%s.php', $solutionDirectory, $year, $day);

    $testDirectory = sprintf('%s/../tests/AdventOfCode/Y%s', __DIR__, $year);
    $testFile = sprintf('%s/Y%sDay%sTest.php', $testDirectory, $year, $day);

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
