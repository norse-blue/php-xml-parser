<?php

namespace NorseBlue\Xmlify\Parser\Exceptions;

use RuntimeException;
use Throwable;

class XmlParseException extends RuntimeException
{
    /** @var string The errored XML content */
    protected $xml_content;

    public function __construct($xml_content = '', $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->xml_content = $xml_content;
    }

    public function getXmlContent()
    {
        return $this->xml_content;
    }
}
