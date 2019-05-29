<?php

namespace NorseBlue\Xmlify\Tests\Unit;

use NorseBlue\Xmlify\Tests\Helpers\TestXmlNodeDocument;
use NorseBlue\Xmlify\Tests\TestCase;

/**
 * Class XmlNodeTest
 *
 * @package NorseBlue\Xmlify\Tests\Unit
 */
class XmlNodeTest extends TestCase
{
    /** @test */
    public function can_create_node()
    {
        $node = new TestXmlNodeDocument('the-node');
    }
}
