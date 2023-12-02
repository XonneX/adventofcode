<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Core\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use XonneX\AdventOfCode\Core\Utils\Templates;
use XonneX\AdventOfCode\Core\Utils\Path;

use function date;
use function file_exists;
use function file_put_contents;
use function is_dir;
use function var_dump;

#[AsCommand("generate", "Generates the necessary files for one day")]
class GenerateCommand extends Command
{
    private int $day;
    private int $year;
    private bool $overwrite;
    private string $inputFile;
    private string $solutionFile;
    private string $testFile;

    protected function configure(): void
    {
        $this->addArgument('day', InputArgument::OPTIONAL, 'The day to generate', date('d'));
        $this->addArgument('year', InputArgument::OPTIONAL, 'The year to generate', date('Y'));
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        assert($output instanceof SymfonyStyle);

        if (
            !$this->parseDay($input, $output)
            || !$this->parseYear($input, $output)
        ) {
            return self::FAILURE;
        }

        $this->parseOverwrite($input, $output);

        if (!$this->fileSetup($output)) {
            return self::FAILURE;
        }

        $this->writeTemplate($output, $this->solutionFile, Templates::getSolutionTemplate());
        $this->writeTemplate($output, $this->testFile, Templates::getTestTemplate());
        $this->writeTemplate($output, $this->inputFile);

        return self::SUCCESS;
    }

    private function parseDay(InputInterface $input, SymfonyStyle $output): bool
    {
        $this->day = (int) $input->getArgument('day');

        if ($this->day > 24 || $this->day < 1) {
            $output->error('Argument day must be between 1 and 24');

            return false;
        }

        return true;
    }

    private function parseYear(InputInterface $input, SymfonyStyle $output): bool
    {
        $this->year = (int) $input->getArgument('year');

        if ($this->year < 2020) {
            $output->error('Argument year must be greater or equal to 2020');

            return false;
        }

        return true;
    }

    private function parseOverwrite(InputInterface $input, SymfonyStyle $output): void
    {
        $this->overwrite = $input->hasOption('overwrite');
    }

    private function fileSetup(SymfonyStyle $output): bool
    {
        $inputDirectory = __DIR__ . '/../../../../inputs/' . $this->year;
        $this->inputFile = $inputDirectory . '/day' . $this->day . '.txt';

        $solutionDirectory = __DIR__ . '/../../Y' . $this->year;
        $this->solutionFile = $solutionDirectory . '/Y' . $this->year . 'Day' . $this->day . '.php';

        $testDirectory = __DIR__ . '/../../../../tests/AdventOfCode/Y' . $this->year;
        $this->testFile = $testDirectory . '/Y' . $this->year . 'Day' . $this->day . 'Test.php';

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
        $template = str_replace(
            ['{{ YEAR }}', '{{ DAY }}'],
            [$this->year, $this->day],
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
