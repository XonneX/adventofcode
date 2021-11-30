<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day7;

use XonneX\AdventOfCode\Core\AbstractSolution;

class Day7 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2020, 7);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);
        $rules = [];

        foreach ($lines as $line) {
            $rules[] = BagRule::createRule($line);
        }

        /** @var BagRule[] $validBags */
        $validBags = [];

        /** @var BagRule[] $searchForBags */
        $searchForBags = [
            BagRule::createMainRule('shiny gold'),
        ];

        while (count($searchForBags) > 0) {
            foreach ($searchForBags as $key => $searchForBag) {
                foreach ($rules as $rule) {
                    if ($rule->containsSubRule($searchForBag)) {
                        $validBags[] = $rule;
                        $searchForBags[] = $rule;
                    }
                }

                unset($searchForBags[$key]);
            }

            $searchForBags = array_unique($searchForBags);
        }

        $validBags = array_unique($validBags);

        foreach ($validBags as $key => $validBag) {
            if ($validBag->isMain()) {
                unset($validBags[$key]);
            }
        }

        return (string) count($validBags);
    }

// TODO: Performance rewrite high priority
    protected function partTwo(string $input): string
    {
        $lines = explode("\n", $input);
        $rules = [];

        foreach ($lines as $line) {
            $rules[] = BagRule::createRule($line);
        }

        /** @var BagRule[] $validBags */
        $validBags = [];

        /** @var BagRule[] $searchForBags */
        $searchForBags = [
            BagRule::createMainRule('shiny gold'),
        ];

        while (count($searchForBags) > 0) {
            foreach ($searchForBags as $key => $searchForBag) {
                foreach ($rules as $rule) {
                    if ($rule->getType() === $searchForBag->getType()) {
                        foreach ($rule->getSubRules() as $subRule) {
                            for ($i = 0; $i < $subRule->getAmount(); $i++) {
                                $validBags[] = $subRule;
                                $searchForBags[] = $subRule;
                            }
                        }
                    }
                }

                unset($searchForBags[$key]);
            }
        }

        return (string) (count($validBags));
    }
}
