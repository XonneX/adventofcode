<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2020\Solutions\Day4;

use PHPUnit\Framework\TestCase;

class Day4Test extends TestCase
{
    public function testSolvePartOneExample(): void
    {
        $day4 = new Day4();

        $day4->setDebugInput(
            <<<TXT
ecl:gry pid:860033327 eyr:Y2020 hcl:#fffffd
byr:1937 iyr:2017 cid:147 hgt:183cm

iyr:2013 ecl:amb cid:350 eyr:2023 pid:028048884
hcl:#cfa07d byr:1929

hcl:#ae17e1 iyr:2013
eyr:2024
ecl:brn pid:760753108 byr:1931
hgt:179cm

hcl:#cfa07d eyr:2025 pid:166559648
iyr:2011 ecl:brn hgt:59in
TXT
        );

        self::assertSame('2', $day4->solvePartOne());
    }

    public function testSolvePartOneWrongAnswerOne(): void
    {
        $day2 = new Day4();

        self::assertNotSame('169', $day2->solvePartOne());
        self::assertTrue(((int) $day2->solvePartOne()) > 169);
    }

    public function testSolvePartOne(): void
    {
        $day4 = new Day4();

        self::assertSame('170', $day4->solvePartOne());
    }

    public function testSolvePartTwoExampleOne(): void
    {
        $day4 = new Day4();

        $testPassport = [
            'byr' => '2002',
            'iyr' => '2015',
            'eyr' => '2025',
            'hgt' => '60in',
            'hcl' => '#123abc',
            'ecl' => 'brn',
            'pid' => '000000001',
        ];

        self::assertTrue($day4->validatePassport($testPassport));

        $passport = $testPassport;
        $passport['byr'] = '2003';
        self::assertFalse($day4->validatePassport($passport));

        $passport = $testPassport;
        $passport['hgt'] = '190cm';
        self::assertTrue($day4->validatePassport($passport));

        $passport = $testPassport;
        $passport['hgt'] = '190in';
        self::assertFalse($day4->validatePassport($passport));

        $passport = $testPassport;
        $passport['hgt'] = '190';
        self::assertFalse($day4->validatePassport($passport));

        $passport = $testPassport;
        $passport['hcl'] = '#123abz';
        self::assertFalse($day4->validatePassport($passport));

        $passport = $testPassport;
        $passport['hcl'] = '123abc';
        self::assertFalse($day4->validatePassport($passport));

        $passport = $testPassport;
        $passport['ecl'] = 'wat';
        self::assertFalse($day4->validatePassport($passport));

        $passport = $testPassport;
        $passport['pid'] = '0123456789';
        self::assertFalse($day4->validatePassport($passport));
    }

    public function testSolvePartTwoExampleTwo(): void
    {
        $day4 = new Day4();

        $day4->setDebugInput(
            <<<TXT
eyr:1972 cid:100
hcl:#18171d ecl:amb hgt:170 pid:186cm iyr:2018 byr:1926

iyr:2019
hcl:#602927 eyr:1967 hgt:170cm
ecl:grn pid:012533040 byr:1946

hcl:dab227 iyr:2012
ecl:brn hgt:182cm pid:021572410 eyr:Y2020 byr:1992 cid:277

hgt:59cm ecl:zzz
eyr:2038 hcl:74454a iyr:2023
pid:3556412378 byr:2007
TXT
        );

        self::assertSame('0', $day4->solvePartTwo());
    }

    public function testSolvePartTwoExampleThree(): void
    {
        $day4 = new Day4();

        $day4->setDebugInput(
            <<<TXT
pid:087499704 hgt:74in ecl:grn iyr:2012 eyr:2030 byr:1980
hcl:#623a2f

eyr:2029 ecl:blu cid:129 byr:1989
iyr:2014 pid:896056539 hcl:#a97842 hgt:165cm

hcl:#888785
hgt:164cm byr:2001 iyr:2015 cid:88
pid:545766238 ecl:hzl
eyr:2022

iyr:2010 hgt:158cm hcl:#b6652a ecl:blu byr:1944 eyr:2021 pid:093154719
TXT
        );

        self::assertSame('4', $day4->solvePartTwo());
    }

    public function testSolvePartTwoWrongAnswerOne(): void
    {
        $day4 = new Day4();

        self::assertNotSame('309', $day4->solvePartTwo());
        self::assertTrue(((int) $day4->solvePartTwo()) < 309);
    }

    public function testSolvePartTwo(): void
    {
        $day4 = new Day4();

        self::assertSame('103', $day4->solvePartTwo());
    }
}
