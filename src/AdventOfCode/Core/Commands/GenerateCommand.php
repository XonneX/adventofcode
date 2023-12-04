<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Core\Commands;

use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use XonneX\AdventOfCode\Core\Utils\Path;
use XonneX\AdventOfCode\Core\Utils\Templates;

use function file_exists;
use function file_put_contents;
use function is_dir;

#[AsCommand(
    name: "generate",
    description: "Generates the necessary files for one day",
    aliases:['ge']
)]
class GenerateCommand extends AbstractCommand
{
    private bool $overwrite;
    private string $inputFile;
    private string $solutionFile;
    private string $testFile;

    #[Override]
    protected function configure(): void
    {
        $this->addDayYearArguments();
    }

    #[Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        assert($output instanceof SymfonyStyle);

        if (
            !$this->parseDay($input, $output)
            || !$this->parseYear($input, $output)
        ) {
            return self::FAILURE;
        }

        $this->parseOverwrite($input);

        if (!$this->fileSetup($output)) {
            return self::FAILURE;
        }

        $this->writeTemplate($output, $this->solutionFile, Templates::getSolutionTemplate());
        $this->writeTemplate($output, $this->testFile, Templates::getTestTemplate());
        $this->writeTemplate($output, $this->inputFile);

        return self::SUCCESS;
    }

    private function parseOverwrite(InputInterface $input): void
    {
        $this->overwrite = $input->hasOption('overwrite');
    }

    private function fileSetup(SymfonyStyle $output): bool
    {
        $year = $this->getYear();
        $day = $this->getDay();

        $inputDirectory = __DIR__ . '/../../../../inputs/' . $year;
        $this->inputFile = $inputDirectory . '/day' . $day . '.txt';

        $solutionDirectory = __DIR__ . '/../../Y' . $year;
        $this->solutionFile = $solutionDirectory . '/Y' . $year . 'Day' . $day . '.php';

        $testDirectory = __DIR__ . '/../../../../tests/AdventOfCode/Y' . $year;
        $this->testFile = $testDirectory . '/Y' . $year . 'Day' . $day . 'Test.php';

        if (
            !$this->mkdir($inputDirectory)
            || !$this->mkdir($solutionDirectory)
            || !$this->mkdir($testDirectory)
        ) {
            $output->error('Cannot create one of the directories');

            return false;
        }

        return true;
    }

    private function mkdir(string $directory): bool
    {
        return !(!is_dir($directory)
                 && !mkdir($directory, recursive: true)
                 && !is_dir($directory));
    }

    private function writeTemplate(SymfonyStyle $output, string $file, string $template = ''): void
    {
        $year = $this->getYear();
        $day = $this->getDay();

        $template = str_replace(
            ['{{ YEAR }}', '{{ DAY }}'],
            [$year, $day],
            $template
        );

        if (file_exists($file)) {
            if ($this->overwrite) {
                file_put_contents($file, $template);
            } else {
                $output->warning(
                    'File already exists and overwrite option is not set: ' . Path::removeProjectPath($file)
                );
            }
        } else {
            file_put_contents($file, $template);
        }
    }
}
