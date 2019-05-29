<?php


namespace NorseBlue\Xmlify\Navigation;


use NorseBlue\Xmlify\Xml;

class XmlNavigator
{
    /** @var \NorseBlue\Xmlify\Xml */
    protected $xml;

    private function __construct(Xml $xml)
    {
        $this->xml = $xml;
    }



    /**
     * Create an XmlNavigator on the given Xml.
     *
     * @param \NorseBlue\Xmlify\Xml $xml
     *
     * @return \NorseBlue\Xmlify\Navigation\XmlNavigator
     */
    public function on(Xml $xml)
    {
        return new self($xml);
    }
}
