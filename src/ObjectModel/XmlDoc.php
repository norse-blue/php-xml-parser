<?php

declare(strict_types=1);

namespace NorseBlue\Xmlify\ObjectModel;

use DOMDocument;
use NorseBlue\Prim\Traits\HasPropertyAccessors;
use NorseBlue\Xmlify\Contracts\XmlNode as XmlNodeContract;
use NorseBlue\Xmlify\Strings\Encoding;

/**
 * Class XmlDoc
 *
 * @package NorseBlue\Xmlify
 *
 * @property-read XmlNode $root
 */
class XmlDoc
{
    use HasPropertyAccessors;

    /** @var XmlElement */
    private $root;

    public function __construct(string $xml_content)
    {
        $dom = $this->loadDom($xml_content);

        $this->root = XmlNode::createFromDomElement($dom->documentElement);
    }

    /**
     * Load the XML contents into DOM
     *
     * @param string $xml_content
     *
     * @return \DOMDocument
     */
    private function loadDom(string $xml_content): DOMDocument
    {
        $dom = new DOMDocument();

        if ($xml_content !== '') {
            $dom->loadXML(
                Encoding::toUtf8($xml_content),
                LIBXML_BIGLINES | LIBXML_COMPACT | LIBXML_PARSEHUGE
            );
        }

        return $dom;
    }

    public function getRootProperty(): XmlNodeContract
    {
        return $this->root;
    }
}
