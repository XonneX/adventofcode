<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2021\Solutions\Day14;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_pop;
use function array_shift;
use function count_chars;
use function exp;
use function explode;
use function implode;
use function print_r;
use function sort;
use function str_replace;
use function str_split;
use function strlen;
use function substr;
use function substr_replace;

use const PHP_EOL;

class Day14 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2021, 14);
    }

    protected function partOne(string $input): string
    {
        [$template, $insertionRules] = explode("\n\n", $input);

        $templateGroups = $this->buildTemplateGroups($template);

        $insertionRules = explode("\n", $insertionRules);

        foreach ($insertionRules as $key => $insertionRule) {
            [$elements, $replacement] = explode(' -> ', $insertionRule);

            $elementsArr = str_split($elements);

            $insertionRules[$key] = [
                'elements' => $elements,
                'replacement' => $elementsArr[0] . $replacement . $elementsArr[1],
            ];
        }

        for ($i = 0; $i < 10; $i++) {
            foreach ($templateGroups as $key => $templateGroup) {
                if (strlen($templateGroup) !== 2) {
                    continue;
                }

                foreach ($insertionRules as ['elements' => $elements, 'replacement' => $replacement]) {
                    if ($templateGroup === $elements) {
                        $templateGroups[$key] = $replacement;
                        break;
                    }
                }
            }

            $template = '';
            foreach ($templateGroups as $templateGroup) {
                if ($template === '') {
                    $template .= $templateGroup;
                } else {
                    $template .= substr($templateGroup, 1);
                }
            }
            $templateGroups = $this->buildTemplateGroups($template);
        }

        $counts = count_chars($template, 1);
        sort($counts);

        return (string) (array_pop($counts) - array_shift($counts));
    }

    private function buildTemplateGroups(string $template): array
    {
        $templateCharacters = str_split($template);
        $templateGroups = [];
        $previous = null;
        foreach ($templateCharacters as $character) {
            if ($previous !== null) {
                $templateGroups[] = $previous . $character;
            }

            $previous = $character;
        }

        return $templateGroups;
    }

    protected function partTwo(string $input): string
    {
        [$template, $insertionRules] = explode("\n\n", $input);

        $templateGroups = $this->buildTemplateGroups($template);

        $insertionRules = explode("\n", $insertionRules);

        foreach ($insertionRules as $key => $insertionRule) {
            [$elements, $replacement] = explode(' -> ', $insertionRule);

            $elementsArr = str_split($elements);

            $insertionRules[$key] = [
                'elements' => $elements,
                'replacement' => $elementsArr[0] . $replacement . $elementsArr[1],
            ];
        }

        for ($i = 0; $i < 40; $i++) {
            foreach ($templateGroups as $key => $templateGroup) {
                if (strlen($templateGroup) !== 2) {
                    continue;
                }

                foreach ($insertionRules as ['elements' => $elements, 'replacement' => $replacement]) {
                    if ($templateGroup === $elements) {
                        $templateGroups[$key] = $replacement;
                        break;
                    }
                }
            }

            $template = '';
            foreach ($templateGroups as $templateGroup) {
                if ($template === '') {
                    $template .= $templateGroup;
                } else {
                    $template .= substr($templateGroup, 1);
                }
            }
            $templateGroups = $this->buildTemplateGroups($template);
        }

        $counts = count_chars($template, 1);
        sort($counts);

        return (string) (array_pop($counts) - array_shift($counts));
    }
}
