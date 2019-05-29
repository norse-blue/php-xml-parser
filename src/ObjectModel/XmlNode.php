<?php

declare(strict_types=1);

namespace NorseBlue\Xmlify\ObjectModel;

use NorseBlue\Prim\Traits\HasPropertyAccessors;
use NorseBlue\Xmlify\Collections\XmlAttributeCollection;
use NorseBlue\Xmlify\Collections\XmlNodeCollection;
use NorseBlue\Xmlify\Contracts\XmlAttribute as XmlAttributeContract;
use NorseBlue\Xmlify\Contracts\XmlNode as XmlNodeContract;
use NorseBlue\Xmlify\Enums\XmlNodeType;
use NorseBlue\Xmlify\Parser\Exceptions\MissingXmlAttributeException;
use NorseBlue\Xmlify\Parser\Exceptions\MissingXmlNodeException;

/**
 * Class XmlNode
 *
 * @package NorseBlue\Xmlify
 *
 * @property-read string $name
 */
abstract class XmlNode implements XmlNodeContract
{
    use HasPropertyAccessors;

    /** @var string The namespace prefix. */
    public const NAMESPACE_PREFIX = ':';

    /** @var string The child prefix. */
    public const CHILD_PREFIX = '.';

    /** @var string The attribute prefix. */
    public const ATTRIBUTE_PREFIX = '@';

    /** @var string The name of the node. */
    private $name;

    /** @var XmlNode The parent node. */
    private $parent;

    /** @var mixed The value of the node. */
    private $value;

    /** @var XmlNodeCollection The children nodes. */
    private $children;

    /** @var XmlNode The previous sibling node. */
    private $previous;

    /** @var XmlNode The next sibling node. */
    private $next;

    /** @var XmlAttributeCollection The node attributes. */
    private $attributes;

    /** @var XmlNamespace The node namespace. */
    private $namespace;

    /** @var string The node prefix. */
    private $prefix;

    /**
     * XmlNode constructor.
     *
     * @param string $name
     * @param \NorseBlue\Xmlify\ObjectModel\XmlNode|null $parent
     * @param mixed $value
     */
    protected function __construct(string $name, XmlNode $parent = null, $value = null)
    {
        $this->name = $name;
        $this->parent = $parent;
        $this->value = $value;

        $this->children = new XmlNodeCollection();
        $this->attributes = new XmlAttributeCollection();
    }

    /**
     * Create a new node instance.
     *
     * @param string $name
     * @param \NorseBlue\Xmlify\Enums\XmlNodeType|null $type
     * @param \NorseBlue\Xmlify\ObjectModel\XmlNode|null $parent
     * @param mixed $value
     *
     * @return \NorseBlue\Xmlify\ObjectModel\XmlNode
     */
    public static function create(string $name, XmlNodeType $type = null, XmlNode $parent = null, $value = null)
    {
        if ($type === null) {
            return new static($name, $parent, $value);
        }


    }

    //region ===== XmlNode =====

    public function getNameProperty(bool $omit_prefix = false): string
    {
        $name = $this->name;

        if ($omit_prefix) {
            $name = str_replace(sprintf('%s:', $this->root->prefix ?? ''), '', $name);
        }

        return $name;
    }

    public function getParentProperty(): ?XmlNodeContract
    {
        return $this->parent;
    }

    public function getValueProperty()
    {
        return $this->value;
    }

    public function getChildrenProperty(): XmlNodeCollection
    {
        return $this->children;
    }

    public function getPreviousProperty(): ?XmlNodeContract
    {
        return $this->previous;
    }

    public function getNextProperty(): ?XmlNodeContract
    {
        return $this->next;
    }

    public function getAttributesProperty(): XmlAttributeCollection
    {
        return $this->attributes;
    }

    public function getNamespaceProperty(): XmlNamespace
    {
        return $this->namespace;
    }

    public function getPrefixProperty(): string
    {
        return $this->prefix;
    }

    public function hasChild(string $name): bool
    {
        return $this->children->has($name);
    }

    public function getChild(string $name): XmlNodeContract
    {
        $name = ltrim($name, self::CHILD_PREFIX);

        if (!$this->hasChild($name)) {
            // TODO: Refactor
            throw new MissingXmlNodeException('');
        }

        return $this->children[$name];
    }

    public function hasAttribute(string $name): bool
    {
        return $this->attributes->has($name);
    }

    public function getAttribute(string $name): XmlAttributeContract
    {
        $name = ltrim($name, self::ATTRIBUTE_PREFIX);

        if (!$this->hasAttribute($name)) {
            // TODO: Refactor
            throw new MissingXmlAttributeException('');
        }

        return $this->attributes[$name];
    }

    //endregion XmlNode
}
