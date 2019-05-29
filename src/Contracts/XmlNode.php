<?php

namespace NorseBlue\Xmlify\Contracts;

use NorseBlue\Xmlify\Collections\XmlAttributeCollection;
use NorseBlue\Xmlify\Collections\XmlNodeCollection;
use NorseBlue\Xmlify\Enums\XmlNodeType;
use NorseBlue\Xmlify\ObjectModel\XmlNamespace;

/**
 * Interface XmlNode
 *
 * @package NorseBlue\Xmlify\Contracts
 */
interface XmlNode
{
    //region ===== Accessors =====

    /**
     * Get the name.
     *
     * @param bool $omit_prefix If true, the prefix will be omitted.
     *
     * @return string
     */
    function getNameProperty(bool $omit_prefix = false): string;

    /**
     * Get the parent.
     *
     * @return \NorseBlue\Xmlify\Contracts\XmlNode|null
     */
    public function getParentProperty(): ?self;

    /**
     * Get the value.
     *
     * @return mixed
     */
    public function getValueProperty();

    /**
     * Get the children.
     *
     * @return \NorseBlue\Xmlify\Collections\XmlNodeCollection
     */
    public function getChildrenProperty(): XmlNodeCollection;

    /**
     * Get the previous sibling.
     *
     * @return \NorseBlue\Xmlify\Contracts\XmlNode|null
     */
    public function getPreviousProperty(): ?self;

    /**
     * Get the next sibling.
     *
     * @return \NorseBlue\Xmlify\Contracts\XmlNode|null
     */
    public function getNextProperty(): ?self;

    /**
     * Get the attributes.
     *
     * @return \NorseBlue\Xmlify\Collections\XmlAttributeCollection
     */
    public function getAttributesProperty(): XmlAttributeCollection;

    /**
     * Get the namespace.
     *
     * @return \NorseBlue\Xmlify\ObjectModel\XmlNamespace
     */
    public function getNamespaceProperty(): XmlNamespace;

    /**
     * Get the prefix.
     *
     * @return string
     */
    public function getPrefixProperty(): string;

    /**
     * Get node type.
     *
     * @return \NorseBlue\Xmlify\Enums\XmlNodeType
     */
    public function getTypeProperty(): XmlNodeType;

    //endregion Accessors

    /**
     * Check if the node has a child.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasChild(string $name): bool;

    /**
     * Get a node child.
     *
     * @param string $name
     *
     * @return \NorseBlue\Xmlify\Contracts\XmlNode
     *
     * @throws \NorseBlue\Xmlify\Parser\Exceptions\MissingXmlNodeException
     */
    public function getChild(string $name): self;

    /**
     * Check if the node has an attribute.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasAttribute(string $name): bool;

    /**
     * Get the node attribute.
     *
     * @param string $name
     *
     * @return \NorseBlue\Xmlify\Contracts\XmlAttribute
     *
     * @throws \NorseBlue\Xmlify\Parser\Exceptions\MissingXmlAttributeException
     */
    public function getAttribute(string $name): XmlAttribute;
}
