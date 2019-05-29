<?php

namespace NorseBlue\Xmlify\Contracts;

/**
 * Interface XmlParser
 *
 * @package NorseBlue\Xmlify\Contracts\Parsers
 */
interface XmlParser
{
    public function parse(string $contents);

    public function parseFile(string $path);
}
