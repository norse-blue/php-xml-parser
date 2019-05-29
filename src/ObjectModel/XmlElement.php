<?php

declare(strict_types=1);

namespace NorseBlue\Xmlify\ObjectModel;

/**
 * Class XmlElement
 *
 * @package NorseBlue\Xmlify\ObjectModel
 */
class XmlElement extends XmlNode
{
    public function __construct(string $name, XmlNode $parent = null, $value = null)
    {
        parent::__construct($name, $parent, $value);
    }
}
