<?php

declare(strict_types=1);

namespace XonneX\AdventOfCode\Y2022\Solutions\Day7;

use RuntimeException;
use XonneX\AdventOfCode\Core\AbstractSolution;

use function array_shift;
use function explode;
use function str_starts_with;
use function substr;

class Day7 extends AbstractSolution
{
    public function __construct()
    {
        parent::__construct(2022, 7);
    }

    protected function partOne(string $input): string
    {
        $lines = explode("\n", $input);
        array_shift($lines);

        $files = [];
        $dirs = [];
        $dirs['/'] = 'dir';
        $pwd = '/';

        foreach ($lines as $line) {
            if ($line === '$ cd ..') {
                $pwd = substr($pwd, 0, strrpos($pwd, '/') - 1);
            } elseif (str_starts_with($line, '$ cd ')) {
                $pwd .= substr($line, 5) . '/';
            } elseif ($line === '$ ls') {
            } else {
                [$size, $file] = explode(' ', $line);

                if ($size === 'dir') {
                    $dirs[$pwd . $file] = $size;
                } else {
                    $files[$pwd . $file] = $size;
                }
            }
        }

        print_r($dirs);
        print_r($files);

        return (string) 1;
    }

    protected function partTwo(string $input): string
    {
        throw new RuntimeException('Not implemented yet');
    }
}
