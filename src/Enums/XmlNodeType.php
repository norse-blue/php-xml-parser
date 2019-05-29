<?php

namespace NorseBlue\Xmlify\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class XmlNodeType
 *
 * @package NorseBlue\Xmlify\Enums
 *
 * @method static ATTRIBUTE(): self
 * @method static CDATA_SECTION(): self
 * @method static COMMENT(): self
 * @method static DOCUMENT(): self
 * @method static DOCUMENT_FRAGMENT(): self
 * @method static DOCUMENT_TYPE(): self
 * @method static ELEMENT(): self
 * @method static ENTITY(): self
 * @method static ENTITY_REFERENCE(): self
 * @method static NOTATION(): self
 * @method static PROCESSING_INSTRUCTION(): self
 * @method static TEXT(): self
 */
final class XmlNodeType extends Enum
{
    public const ATTRIBUTE = XML_ATTRIBUTE_NODE;
    public const CDATA_SECTION = XML_CDATA_SECTION_NODE;
    public const COMMENT = XML_COMMENT_NODE;
    public const DOCUMENT = XML_DOCUMENT_NODE;
    public const DOCUMENT_FRAGMENT = XML_DOCUMENT_FRAG_NODE;
    public const DOCUMENT_TYPE = XML_DOCUMENT_TYPE_NODE;
    public const ELEMENT = XML_ELEMENT_NODE;
    public const ENTITY = XML_ENTITY_NODE;
    public const ENTITY_REFERENCE = XML_ENTITY_REF_NODE;
    public const NOTATION = XML_NOTATION_NODE;
    public const PROCESSING_INSTRUCTION = XML_PI_NODE;
    public const TEXT = XML_TEXT_NODE;

    protected const TYPE_CLASS_LOOKUP_TABLE = [
        XML_ATTRIBUTE_NODE => '',
        XML_CDATA_SECTION_NODE => '',
        XML_COMMENT_NODE => '',
        XML_DOCUMENT_NODE => '',
        XML_DOCUMENT_FRAG_NODE => '',
        XML_DOCUMENT_TYPE_NODE => '',
        XML_ELEMENT_NODE => '',
        XML_ENTITY_NODE => '',
        XML_ENTITY_REF_NODE => '',
        XML_NOTATION_NODE => '',
        XML_PI_NODE => '',
        XML_TEXT_NODE => '',
    ];
}
