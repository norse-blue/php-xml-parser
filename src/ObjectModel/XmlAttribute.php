<?php

declare(strict_types=1);

namespace NorseBlue\Xmlify\ObjectModel;

use NorseBlue\Xmlify\Contracts\XmlAttribute as XmlAttributeContract;

class XmlAttribute implements XmlAttributeContract
{
    /**
     * @inheritDoc
     */
    public function getNameProperty($omit_prefix = false): string
    {
        // TODO: Implement getNameProperty() method.
    }

    /**
     * @inheritDoc
     */
    public function getPrefixProperty(): string
    {
        // TODO: Implement getPrefixProperty() method.
    }

    /**
     * @inheritDoc
     */
    public function getValueProperty()
    {
        // TODO: Implement getValueProperty() method.
    }
}
