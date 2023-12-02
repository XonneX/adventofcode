<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Core\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use XonneX\AdventOfCode\Core\Run\Runner;

#[AsCommand("run")]
class RunCommand extends Command
{
    protected function configure(): void
    {
        $this->addArgument('day', InputArgument::OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        assert($output instanceof SymfonyStyle);
        $runner = new Runner();

        $solution = $runner->run(2023, 1);

        $solutions = [$solution];

        $table = new Table($output);
        $table->setHeaders(['Day', 'Part', 'Solution', 'Elapsed time']);
        $table->addRow(
            [
                2023,
                1,
                $solution->getPartOne()->getSolution(),
            ]
        );

        return Command::SUCCESS;
    }
}
