<?php

namespace NorseBlue\Xmlify\Contracts;

/**
 * Interface XmlAttribute
 *
 * @package NorseBlue\Xmlify\Contracts
 */
interface XmlAttribute
{
    /**
     * Get the name.
     *
     * @param bool $omit_prefix If true, the prefix will be omitted.
     *
     * @return string
     */
    public function getNameProperty($omit_prefix = false): string;

    /**
     * Get the prefix.
     *
     * @return string
     */
    public function getPrefixProperty(): string;

    /**
     * Get the value.
     *
     * @return string|int|float
     */
    public function getValueProperty();
}
