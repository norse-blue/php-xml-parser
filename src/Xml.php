<?php

declare(strict_types=1);

namespace NorseBlue\Xmlify;

use DOMDocument;
use NorseBlue\Xmlify\Exceptions\PathIsNotFileException;
use NorseBlue\Xmlify\Exceptions\PathNotFoundException;
use NorseBlue\Xmlify\Parser\XmlElement;
use NorseBlue\Xmlify\Parser\XmlParser;
use NorseBlue\Xmlify\Strings\Encoding;

final class Xml
{
    /** @var DOMDocument The DOMDocument */
    protected $xdoc;

    /**
     * Xml constructor.
     *
     * @param string $content
     */
    private function __construct(string $content)
    {
        $this->xdoc = $this->createXDoc(Encoding::toUtf8($content));
    }

    //region ===== Accessors =====
    //endregion Accessors

    //region ===== Mutators =====
    //endregion Mutators

    //region ===== Internal Methods =====

    /**
     * Create an XDoc from a content string.
     *
     * @param string $content
     *
     * @return \DOMDocument
     */
    private function createXDoc(string $content): DOMDocument
    {
        if ($content === '') {
            return new DOMDocument;
        }

        return (new DOMDocument)->loadXML($content, LIBXML_BIGLINES || LIBXML_COMPACT || LIBXML_PARSEHUGE);
    }

    //endregion

    /**
     * Creates a new instance from an XML string.
     *
     * @param string $content
     *
     * @return \NorseBlue\Xmlify\Xml
     */
    public static function text(string $content): self
    {
        return new self($content);
    }

    /**
     * Creates a new instance from an XML file.
     *
     * @param string $path
     *
     * @return \NorseBlue\Xmlify\Xml
     */
    public static function file(string $path): self
    {
        if (!file_exists($path)) {
            throw new PathNotFoundException($path, 'The given path does not exist.');
        }

        if (!is_file($path)) {
            throw new PathIsNotFileException($path, 'The given path is not a file.');
        }

        return self::text(file_get_contents($path));
    }

    /**
     * Get a parser instance.
     *
     * @return \NorseBlue\Xmlify\Parser\XmlParser
     */
    public function parse(): XmlParser
    {
        return new XmlParser($this);
    }

    /**
     * Run a parser instance with the defaults.
     *
     * @return \NorseBlue\Xmlify\Parser\XmlElement
     */
    public function parseRun(): XmlElement
    {
        return $this->parse()->run();
    }
}
