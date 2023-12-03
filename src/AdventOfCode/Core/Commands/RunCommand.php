<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Core\Commands;

use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use XonneX\AdventOfCode\Core\Exceptions\ClassInstantiationException;
use XonneX\AdventOfCode\Core\Exceptions\ClassNotFoundException;
use XonneX\AdventOfCode\Core\Run\Runner;

#[AsCommand("run")]
class RunCommand extends AbstractCommand
{
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

        $runner = new Runner();

        try {
            $solutions = $runner->run($this->getYear(), $this->getDay());
        } catch (ClassInstantiationException $e) {
            $output->error('Could not instantiate class reason: ' . $e->getPrevious()?->getMessage());

            return self::FAILURE;
        } catch (ClassNotFoundException) {
            $output->error('Could not find anything for this day and year');

            return self::FAILURE;
        }

        $table = new Table($output);
        $table->setHeaders(['Day', 'Part', 'Solution', 'Elapsed time']);
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

        $table->render();

        return Command::SUCCESS;
    }
}
