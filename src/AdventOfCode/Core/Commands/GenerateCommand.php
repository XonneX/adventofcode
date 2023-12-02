<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Core\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use function is_dir;

#[AsCommand("generate")]
class GenerateCommand extends Command
{
    protected function configure()
    {
        $this->addArgument('day', InputArgument::OPTIONAL);
        $this->addArgument('year', InputArgument::OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        assert($output instanceof SymfonyStyle);

        if ($input->hasArgument('day')) {
            $day = (int) $input->getArgument('day');

            if ($day > 24 || $day < 1) {
                $output->error('Argument day must be between 1 and 24');

                return self::FAILURE;
            }
        } else {
            $day = (int) date('d');
        }

        if ($input->hasArgument('year')) {
            $year = (int) $input->getArgument('year');

            if ($year > 24 || $year < 1) {
                $output->error('Argument year must be greater or equal to 2020');

                return self::FAILURE;
            }
        } else {
            $year = (int) date('Y');
        }

        $inputDirectory = __DIR__ . '/../../../../inputs/' . $year;
        $inputFile = $inputDirectory . '/day' . $day . '.txt';

        $solutionDirectory = __DIR__ . '/../../Y' . $year;
        $solutionFile = $solutionDirectory . '/Y' . $year . 'Day' . $day . '.php';

        $testDirectory = __DIR__ . '/../../../../tests/AdventOfCode/Y' . $year;
        $testFile = $testDirectory . '/Y' . $year . 'Day' . $day . 'Test.php';

        if (
            !$this->mkdir($inputDirectory)
            || !$this->mkdir($solutionDirectory)
            || !$this->mkdir($testDirectory)
        ) {
            $output->error('Cannot create one of the directories');
        }

        
    }

    private function mkdir(string $directory): bool
    {
        return !(!is_dir($directory)
                 && !mkdir($directory, recursive: true)
                 && !is_dir($directory));
    }

    private function getSolutionTemplate(): string
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

    private function getTestTemplate(): string
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
