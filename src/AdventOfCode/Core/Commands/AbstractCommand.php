<?php

namespace XonneX\AdventOfCode\Core\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use function date;

class AbstractCommand extends Command
{
    private int $day;
    private int $year;

    protected function addDayYearArguments(): void
    {
        $this->addArgument('day', InputArgument::OPTIONAL, 'The day to run', date('d'));
        $this->addArgument('year', InputArgument::OPTIONAL, 'The year to run', date('Y'));
    }

    protected function parseDay(InputInterface $input, SymfonyStyle $output): bool
    {
        $this->day = (int) $input->getArgument('day');

        if ($this->day > 24 || $this->day < 1) {
            $output->error('Argument day must be between 1 and 24');

            return false;
        }

        return true;
    }

    protected function parseYear(InputInterface $input, SymfonyStyle $output): bool
    {
        $this->year = (int) $input->getArgument('year');

        if ($this->year < 2020) {
            $output->error('Argument year must be greater or equal to 2020');

            return false;
        }

        return true;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getYear(): int
    {
        return $this->year;
    }
}
