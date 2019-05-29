<?php

namespace NorseBlue\Xmlify\Parser;

use NorseBlue\Xmlify\Parser\Exceptions\XmlParseException;
use NorseBlue\Xmlify\Xml;
use SimpleXMLElement;

class XmlParser
{
    /** @var Xml The XML object */
    protected $xml;

    /**
     * @var int The Libxml parameters
     * @see https://www.php.net/manual/en/function.simplexml-load-string.php
     */
    protected $options;

    /**
     * The namespace to use.
     *
     * @var string
     * @see https://www.php.net/manual/en/function.simplexml-load-string.php
     */
    protected $namespace;

    /**
     * Whether the namespace is a prefix or not.
     *
     * @see https://www.php.net/manual/en/function.simplexml-load-string.php
     */
    protected $namespace_is_prefix;

    /**
     * XmlParser constructor.
     *
     * @param \NorseBlue\Xmlify\Xml $xml
     */
    public function __construct(Xml $xml)
    {
        $this->reset();
        $this->setXml($xml);
    }

    //region ===== Accessors =====

    /**
     * Get the XML object.
     *
     * @return \NorseBlue\Xmlify\Xml
     */
    public function getXml(): Xml
    {
        return $this->xml;
    }

    //endregion

    //region ===== Mutators =====

    /**
     * Set the XML object.
     *
     * @param \NorseBlue\Xmlify\Xml $xml
     */
    protected function setXml(Xml $xml): void
    {
        $this->xml = $xml;
    }

    //endregion

    /**
     * Reset the parser.
     */
    public function reset(): void
    {
        $this->options = 0;
        $this->namespace = '';
        $this->namespace_is_prefix = false;
    }

    /**
     * Run the parser.
     *
     * @return \NorseBlue\Xmlify\Parser\XmlElement
     */
    public function run(): XmlElement
    {
        $xml_content = $this->xml->getContent();

        if ($xml_content === '') {
            throw new XmlParseException($xml_content, 'Cannot parse an empty string.');
        }

        $xml = simplexml_load_string(
            $xml_content,
            XmlElement::class,
            $this->options,
            $this->namespace,
            $this->namespace_is_prefix
        );

        $this->registerNamespaces($xml);

        return $xml;
    }

    /**
     * Register the namespaces for XPath usage.
     *
     * @param \SimpleXMLElement $xml
     */
    private function registerNamespaces(SimpleXMLElement $xml): void
    {
        $namespaces = $xml->getNamespaces(true);
        collect($namespaces)->each(function($namespace, $prefix) use ($xml) {
            $xml->registerXPathNamespace($prefix, $namespace);
        });
    }
}
