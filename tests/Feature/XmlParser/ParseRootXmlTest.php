<?php


namespace NorseBlue\Xmlify\Tests\Feature\XmlParser;


use function NorseBlue\Xmlify\Tests\asset_file_get_contents;
use function NorseBlue\Xmlify\Tests\asset_path;
use NorseBlue\Xmlify\Tests\TestCase;
use NorseBlue\Xmlify\Xml;

class ParseRootXmlTest extends TestCase
{
    /** @var string The asset file with which to run the tests */
    protected $file = 'root.xml';

    /** @var string The file path */
    protected $path;

    /** @var string The XML file content */
    protected $xml_content;

    public function setUp(): void
    {
        $this->path = asset_path($this->file);
        $this->xml_content = asset_file_get_contents($this->file);
    }

    /** @test */
    public function it_parses_an_only_root_xml_with_defaults()
    {
        $result = Xml::text($this->xml_content)
            ->parseRun()
            ->toArray();

        $this->assertEquals([], $result);
    }
}
