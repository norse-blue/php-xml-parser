<?php

namespace NorseBlue\Xmlify\Strings;

use NorseBlue\Xmlify\Parser\Exceptions\InvalidEncodingException;

class Encoding
{
    /** @var string UTF-8 encoding */
    const UTF_8 = 'UTF-8';

    private function __construct()
    {
    }

    /**
     * Convert the string to UTF-8 encoding.
     *
     * @param string $str
     *
     * @return string
     */
    public static function toUtf8(string $str): string
    {
        $encoding = mb_detect_encoding($str);

        if ($encoding === false) {
            throw new InvalidEncodingException('The string encoding could not be detected.');
        }

        if ($encoding === self::UTF_8) {
            return $str;
        }

        return mb_convert_encoding($str, self::UTF_8, $encoding);
    }
}
