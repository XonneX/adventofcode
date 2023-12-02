<?php

namespace XonneX\AdventOfCode\Core\Utils;

use function getcwd;
use function str_replace;

class Path
{
    public static function removeProjectPath(string $path): string
    {
        return str_replace(getcwd(), '', $path);
    }
}
