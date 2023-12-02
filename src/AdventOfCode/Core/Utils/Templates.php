<?php

namespace XonneX\AdventOfCode\Core\Utils;

class Templates
{
    public static function getSolutionTemplate(): string
    {
        return <<<'PHP'
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
    }

    public static function getTestTemplate(): string
    {
        return <<<'PHP'
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
    }
}
