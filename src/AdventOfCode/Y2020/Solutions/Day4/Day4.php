<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day4;

use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_key_exists;
use function explode;
use function in_array;
use function preg_match;
use function str_ends_with;
use function substr;

class Day4 extends AbstractSolution
{
    private const EYE_COLORS = ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth'];

    private array $passports;

    public function __construct()
    {
        parent::__construct(2020, 4);
    }

    protected function partOne(string $input): string
    {
        $this->parsePassports($input);

        $requiredFields = [
            'byr',
            'iyr',
            'eyr',
            'hgt',
            'hcl',
            'ecl',
            'pid',
        ];

        $validPassportsCounter = 0;
        foreach ($this->passports as $passport) {
            $valid = true;

            foreach ($requiredFields as $key) {
                if (!array_key_exists($key, $passport)) {
                    $valid = false;

                    break;
                }
            }

            if ($valid) {
                $validPassportsCounter++;
            }
        }

        return (string) $validPassportsCounter;
    }

    protected function partTwo(string $input): string
    {
        $this->parsePassports($input);

        $validPassportsCounter = 0;
        foreach ($this->passports as $passport) {
            if ($this->validatePassport($passport)) {
                $validPassportsCounter++;
            }
        }

        return (string) $validPassportsCounter;
    }

    private function parsePassports(string $input): void
    {
        $lines           = explode("\n", $input);
        $this->passports = [];
        $currentPassport = null;

        foreach ($lines as $line) {
            if ($line === '') {
                $this->passports[] = $currentPassport;
                $currentPassport   = null;
                continue;
            }

            if ($currentPassport === null) {
                $currentPassport = [];
            }

            $map = explode(' ', $line);

            foreach ($map as $field) {
                [$key, $value] = explode(':', $field);

                $currentPassport[$key] = $value;
            }
        }

        if ($currentPassport !== null) {
            $this->passports[] = $currentPassport;
        }
    }

    public function validatePassport(mixed $passport): bool
    {
        if (!array_key_exists('byr', $passport)) {
            return false;
        }

        $byr = (int) $passport['byr'];

        if ($byr < 1920 || $byr > 2002) {
            return false;
        }

        if (!array_key_exists('iyr', $passport)) {
            return false;
        }

        $iyr = (int) $passport['iyr'];

        if ($iyr < 2010 || $iyr > 2020) {
            return false;
        }

        if (!array_key_exists('eyr', $passport)) {
            return false;
        }

        $eyr = (int) $passport['eyr'];

        if ($eyr < 2020 || $eyr > 2030) {
            return false;
        }

        if (!array_key_exists('hgt', $passport)) {
            return false;
        }

        $hgt = $passport['hgt'];

        if (str_ends_with($hgt, 'cm')) {
            $hgtAmount = (int) substr($hgt, 0, 3);

            if ($hgtAmount < 150 || $hgtAmount > 193) {
                return false;
            }
        } elseif (str_ends_with($hgt, 'in')) {
            $hgtAmount = (int) substr($hgt, 0, 2);

            if ($hgtAmount < 59 || $hgtAmount > 76) {
                return false;
            }
        } else {
            return false;
        }

        if (!array_key_exists('hcl', $passport)) {
            return false;
        }

        $hcl = $passport['hcl'];

        if (preg_match('/^#[0-9a-f]{6}$/', $hcl) !== 1) {
            return false;
        }

        if (!array_key_exists('ecl', $passport)) {
            return false;
        }

        $ecl = $passport['ecl'];

        if (!in_array($ecl, self::EYE_COLORS, true)) {
            return false;
        }

        if (!array_key_exists('pid', $passport)) {
            return false;
        }

        $pid = $passport['pid'];

        return !(preg_match('/^[\d]{9}$/', $pid) !== 1);
    }
}
