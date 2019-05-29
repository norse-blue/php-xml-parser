<?php

namespace NorseBlue\Xmlify\Tests\Helpers;

use NorseBlue\Xmlify\Enums\XmlNodeType;
use NorseBlue\Xmlify\ObjectModel\XmlNode;

/**
 * Class TestXmlNodeDocument
 *
 * @package NorseBlue\Xmlify\Tests\Helpers
 */
class TestXmlNodeDocument extends XmlNode
{
    public function getTypeProperty(): XmlNodeType
    {
        return XmlNodeType::DOCUMENT();
    }
}
