<?php

namespace Divante\Integration\Parser;

/**
 * Class XmlParser
 * @package Divante\Integration\Parser
 */
class XmlParser implements ParserInterface
{
    /**
     * Type of data for parsing
     */
    const TYPE = 'xml';

    /**
     * @return string
     */
    public static function getType()
    {
        return self::TYPE;
    }

    /**
     * @param $content
     * @return array|\SimpleXMLElement
     */
    public function parse($content)
    {
        return simplexml_load_string($content);
    }
}