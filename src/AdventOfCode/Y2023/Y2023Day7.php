<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_count_values;
use function array_unshift;
use function array_values;
use function explode;
use function implode;
use function print_r;
use function sort;
use function str_split;
use function substr;
use function usort;
use function var_dump;

use const PHP_EOL;

class Y2023Day7 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2023, 7);
    }

    protected function partOne(string $input): string
    {
        $cardsStrength = [
            2 => 1,
            3 => 2,
            4 => 3,
            5 => 4,
            6 => 5,
            7 => 6,
            8 => 7,
            9 => 8,
            'T' => 9,
            'J' => 10,
            'Q' => 11,
            'K' => 12,
            'A' => 13,
        ];

        $lines = explode("\n", $input);

        $hands = [];
        foreach ($lines as $line) {
            $cards = str_split(substr($line, 0, 5));
            $cardsSorted = array_values($cards);
            sort($cardsSorted);

            $hands[] = [
                'cards' => $cards,
                'cardsSorted' => $cardsSorted,
                'bid' => substr($line, 6),
            ];
        }

        usort($hands, function ($hand1, $hand2) use ($cardsStrength) {
            [
                'cards' => $cards1,
                'cardsSorted' => $cardsSorted1,
            ] = $hand1;
            [
                'cards' => $cards2,
                'cardsSorted' => $cardsSorted2,
            ] = $hand2;

            $state1 = $this->getState($cards1, $cardsSorted1);
            $state2 = $this->getState($cards2, $cardsSorted2);

            if ($state1 !== $state2) {
                return $state1 <=> $state2;
            }

            foreach ($cards1 as $key => $card1) {
                $card2 = $cards2[$key];
                if ($card1 !== $card2) {
                    return $cardsStrength[$card1] <=> $cardsStrength[$card2];
                }
            }

            throw new RuntimeException('Just dont reach this');
        });

        $sum = 0;
        $i = 1;
        foreach ($hands as $hand) {
            $sum += $hand['bid'] * $i;
            $i++;
        }

        return (string) $sum;
    }

    private function getState(array $cards, array $cardsSorted): int
    {
        $state = 0; // high card
        if (
            $cards[0] === $cards[1]
            && $cards[0] === $cards[2]
            && $cards[0] === $cards[3]
            && $cards[0] === $cards[4]
        ) {
            $state = 6; // five of a kind
        } elseif (
            $cardsSorted[1] === $cardsSorted[2]
            && $cardsSorted[2] === $cardsSorted[3]
            && (
                $cardsSorted[0] === $cardsSorted[1]
                || $cardsSorted[4] === $cardsSorted[3]
            )
        ) {
            $state = 5; // four of a kind
        } elseif (
            $cardsSorted[0] === $cardsSorted[1]
            && $cardsSorted[3] === $cardsSorted[4]
            && (
                $cardsSorted[0] === $cardsSorted[2]
                || $cardsSorted[4] === $cardsSorted[2]
            )
        ) {
            $state = 4; // full house
        } elseif (
            (
                $cardsSorted[0] === $cardsSorted[1]
                && $cardsSorted[0] === $cardsSorted[2]
            ) || (
                $cardsSorted[1] === $cardsSorted[2]
                && $cardsSorted[2] === $cardsSorted[3]
            ) || (
                $cardsSorted[2] === $cardsSorted[3]
                && $cardsSorted[2] === $cardsSorted[4]
            )
        ) {
            $state = 3; // three of a kind
        } elseif (
            (
                $cardsSorted[0] === $cardsSorted[1]
                && (
                    $cardsSorted[2] === $cardsSorted[3]
                    || $cardsSorted[3] === $cardsSorted[4]
                )
            ) || (
                $cardsSorted[1] === $cardsSorted[2]
                && $cardsSorted[3] === $cardsSorted[4]
            ) || (
                $cardsSorted[3] === $cardsSorted[4]
                && (
                    $cardsSorted[0] === $cardsSorted[1]
                    || $cardsSorted[1] === $cardsSorted[2]
                )
            )
        ) {
            $state = 2; // two pair
        } elseif (
            $cardsSorted[0] === $cardsSorted[1]
            || $cardsSorted[1] === $cardsSorted[2]
            || $cardsSorted[2] === $cardsSorted[3]
            || $cardsSorted[3] === $cardsSorted[4]
        ) {
            $state = 1; // one pair
        }

        return $state;
    }

    protected function partTwo(string $input): string
    {
        $cardsStrength = [
            2 => 1,
            3 => 2,
            4 => 3,
            5 => 4,
            6 => 5,
            7 => 6,
            8 => 7,
            9 => 8,
            'T' => 9,
            'J' => 10,
            'Q' => 11,
            'K' => 12,
            'A' => 13,
        ];

        $lines = explode("\n", $input);

        $hands = [];
        foreach ($lines as $line) {
            $cards = str_split(substr($line, 0, 5));
            $cardsSorted = array_values($cards);
            sort($cardsSorted);

            $hands[] = [
                'cards' => $cards,
                'cardsSorted' => $cardsSorted,
                'bid' => substr($line, 6),
                'jokers' => array_count_values($cards)['J'] ?? 0,
            ];
        }

        usort($hands, function ($hand1, $hand2) use ($cardsStrength) {
            [
                'cards' => $cards1,
                'cardsSorted' => $cardsSorted1,
            ] = $hand1;
            [
                'cards' => $cards2,
                'cardsSorted' => $cardsSorted2,
            ] = $hand2;

            $state1 = $this->getState($this->replaceJokers($cards1), $this->replaceJokers($cardsSorted1));
            $state2 = $this->getState($this->replaceJokers($cards2), $this->replaceJokers($cardsSorted2));

            if ($state1 !== $state2) {
                return $state1 <=> $state2;
            }

            foreach ($cards1 as $key => $card1) {
                $card2 = $cards2[$key];
                if ($card1 !== $card2) {
                    return $cardsStrength[$card1] <=> $cardsStrength[$card2];
                }
            }

            throw new RuntimeException('Just dont reach this');
        });

        $sum = 0;
        $i = 1;
        foreach ($hands as $hand) {
            $sum += $hand['bid'] * $i;
            $i++;
        }

        return (string) $sum;
    }

    public function replaceJokers(array $values): array
    {
        echo implode('', $values);
        $counts = array_count_values($values);

        arsort($counts);

        if (key($counts) === 'J') {
            array_shift($counts);
        }

        $card = key($counts);

        foreach ($values as $key => $value) {
            if ($value === 'J') {
                $values[$key] = $card;
            }
        }

        echo ' => ' . implode('', $values) . PHP_EOL;

        return $values;
    }
}
