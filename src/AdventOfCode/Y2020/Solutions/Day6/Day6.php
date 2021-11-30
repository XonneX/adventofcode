<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day6;

use JetBrains\PhpStorm\Pure;
use XonneX\AdventOfCode\Core\AbstractSolution;

class Day6 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2020, 6);
    }

    #[Pure]
    protected function partOne(
        string $input
    ): string {
        $lines = explode("\n", $input);

        $countAnswers = 0;

        $groupAnswers = '';
        foreach ($lines as $line) {
            if ($line !== '') {
                $groupAnswers .= $line;
                continue;
            }

            $uniqueGroupAnswers = implode('', array_unique(str_split($groupAnswers)));
            $countAnswers += strlen($uniqueGroupAnswers);

            $groupAnswers = '';
        }

        $uniqueGroupAnswers = implode('', array_unique(str_split($groupAnswers)));
        $countAnswers += strlen($uniqueGroupAnswers);

        return (string) $countAnswers;
    }

    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);

        $countAnswers = 0;

        $groupAnswers = [];
        foreach ($lines as $line) {
            if ($line !== '') {
                $groupAnswers[] = $line;
                continue;
            }

            $countAnswers += $this->calculateAllGroupYesAnswers($groupAnswers);

            $groupAnswers = [];
        }

        $countAnswers += $this->calculateAllGroupYesAnswers($groupAnswers);

        return (string) $countAnswers;
    }

    /**
     * @param list<string> $answers
     * @return int
     */
    private function calculateAllGroupYesAnswers(array $answers): int
    {
        if (count($answers) === 1) {
            return strlen(array_pop($answers));
        }

        $allYesAnswers = str_split(array_shift($answers));

        foreach ($answers as $answer) {
            foreach ($allYesAnswers as $key => $allYesAnswer) {
                if (!str_contains($answer, $allYesAnswer)) {
                    unset($allYesAnswers[$key]);
                }
            }
        }

        return count($allYesAnswers);
    }
}
