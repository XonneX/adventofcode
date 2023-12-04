<?php

namespace XonneX\AdventOfCode\Core\Commands;

use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Throwable;
use XonneX\AdventOfCode\Core\Run\Runner;

use function assert;
use function range;

#[AsCommand(
    name: 'report',
    description: 'Generates the report of all days and years',
    aliases: ['re']
)]
class ReportCommand extends Command
{
    #[Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        assert($output instanceof SymfonyStyle);

        $runner = new Runner();

        foreach (range(2020, date('Y')) as $year) {
            $output->title('Year ' . $year);

            $table = new Table($output);
            $table->setHeaders(['Day', 'Part', 'Solution', 'Elapsed time']);

            foreach (range(1, 24) as $day) {
                try {
                    $solutions = $runner->run($year, $day);

                    foreach ($solutions as $solution) {
                        $table->addRow(
                            [
                                $solution->getDay(),
                                $solution->getPart(),
                                $solution->getSolution(),
                                $solution->getTime() . ' ms',
                            ]
                        );
                    }
                } catch (Throwable) {
                    if ($output->isVerbose()) {
                        $output->warning('Skipped year ' . $year . ' day ' . $day);
                    }
                }
            }

            $table->render();
        }

        return self::SUCCESS;
    }
}
