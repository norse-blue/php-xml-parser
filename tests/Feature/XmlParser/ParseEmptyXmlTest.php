<?php

namespace NorseBlue\Xmlify\Tests\Feature\XmlParser;

use NorseBlue\Xmlify\Parser\Exceptions\XmlParseException;
use NorseBlue\Xmlify\Tests\TestCase;
use NorseBlue\Xmlify\Xml;

class ParseEmptyXmlTest extends TestCase
{
    protected $xml_content = '';

    /** @test */
    public function it_throws_exception_when_parsing_an_empty_string()
    {
        try {
            Xml::text($this->xml_content)
                ->parseRun();
        }
        catch(XmlParseException $e)
        {
            $this->assertEquals($this->xml_content, $e->getXmlContent());
            return;
        }

        $this->fail(XmlParseException::class . ' was not thrown.');
    }
}
