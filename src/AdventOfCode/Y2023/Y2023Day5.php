<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2023;

use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_chunk;
use function array_values;
use function explode;
use function substr;
use function usort;

use const PHP_INT_MAX;

class Y2023Day5 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2023, 5);
    }

    protected function partOne(string $input): string
    {
        $parts = explode("\n\n", $input);

        $seeds = explode(' ', substr($parts[0], 7));
        $seedsToSoilMap = $this->parseMap($parts[1]);
        $soilToFertilizerMap = $this->parseMap($parts[2]);
        $fertilizerToWaterMap = $this->parseMap($parts[3]);
        $waterToLightMap = $this->parseMap($parts[4]);
        $lightToTemperatureMap = $this->parseMap($parts[5]);
        $temperatureToHumidityMap = $this->parseMap($parts[6]);
        $humidityToLocationMap = $this->parseMap($parts[7]);

        $minLocation = PHP_INT_MAX;

        foreach ($seeds as $seed) {
            $seed = (int) $seed;

            $soil = $this->find($seed, $seedsToSoilMap);
            $fertilizer = $this->find($soil, $soilToFertilizerMap);
            $water = $this->find($fertilizer, $fertilizerToWaterMap);
            $light = $this->find($water, $waterToLightMap);
            $temperature = $this->find($light, $lightToTemperatureMap);
            $humidity = $this->find($temperature, $temperatureToHumidityMap);
            $location = $this->find($humidity, $humidityToLocationMap);

            if ($location < $minLocation) {
                $minLocation = $location;
            }
        }

        return (string) $minLocation;
    }

    private function parseMap(string $input): array
    {
        $lines = explode("\n", $input);
        unset($lines[0]);
        $lines = array_values($lines);

        $map = [];

        foreach ($lines as $r => $line) {
            foreach (explode(' ', $line) as $c => $value) {
                $map[$r][$c] = (int) $value;
            }
        }

        return $map;
    }

    private function find(int $input, array $map): int
    {
        $output = $input;

        foreach ($map as [$destinationStart, $sourceStart, $length]) {
            if ($input >= $sourceStart && $input < ($sourceStart + $length)) {
                $output = $destinationStart + ($input - $sourceStart);

                break;
            }
        }

        return $output;
    }

    protected function partTwo(string $input): string
    {
        $parts = explode("\n\n", $input);

        $seeds = array_chunk(explode(' ', substr($parts[0], 7)), 2);
        $seedsToSoilMap = $this->parseMap($parts[1]);
        $soilToFertilizerMap = $this->parseMap($parts[2]);
        $fertilizerToWaterMap = $this->parseMap($parts[3]);
        $waterToLightMap = $this->parseMap($parts[4]);
        $lightToTemperatureMap = $this->parseMap($parts[5]);
        $temperatureToHumidityMap = $this->parseMap($parts[6]);
        $humidityToLocationMap = $this->parseMap($parts[7]);

        usort($humidityToLocationMap, static fn ($a, $b) => $a[0] <=> $b[0]);

        for ($location = 0; $location < PHP_INT_MAX; $location++) {
            $humidity = $this->findReverse($location, $humidityToLocationMap);
            $temperature = $this->findReverse($humidity, $temperatureToHumidityMap);
            $light = $this->findReverse($temperature, $lightToTemperatureMap);
            $water = $this->findReverse($light, $waterToLightMap);
            $fertilizer = $this->findReverse($water, $fertilizerToWaterMap);
            $soil = $this->findReverse($fertilizer, $soilToFertilizerMap);
            $seed = $this->findReverse($soil, $seedsToSoilMap);

            foreach ($seeds as [$startSeed, $length]) {
                if ($seed >= $startSeed && $seed < ($startSeed + $length)) {
                    return (string) $location;
                }
            }
        }

        return '';
    }

    private function findReverse(int $input, array $map): int
    {
        $output = $input;

        foreach ($map as [$destinationStart, $sourceStart, $length]) {
            if ($input >= $destinationStart && $input < ($destinationStart + $length)) {
                $output = $sourceStart + ($input - $destinationStart);

                break;
            }
        }

        return $output;
    }
}
