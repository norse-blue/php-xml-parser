<?php

namespace NorseBlue\Xmlify\Parser\Tests\Feature\XmlParser;

use NorseBlue\Xmlify\Tests\TestCase;
use NorseBlue\Xmlify\Xml;
use function NorseBlue\Xmlify\Tests\asset_file_get_contents;
use function NorseBlue\Xmlify\Tests\asset_path;

class ParseNoteXmlTest extends TestCase
{
    /** @var string The asset file with which to run the tests */
    protected $file = 'note.xml';

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
    public function it_parses_a_simple_xml_with_defaults()
    {
        $result = Xml::text($this->xml_content)
            ->parseRun()
            ->toArray();

        $this->assertEquals([
            'to' => 'Tove',
            'from' => 'Jani',
            'heading' => 'Reminder',
            'body' => 'Don\'t forget me this weekend!',
        ], $result);
    }
}
